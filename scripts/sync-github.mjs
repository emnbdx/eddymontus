#!/usr/bin/env node
/**
 * Sync GitHub repos into the project inventory.
 *
 *   node scripts/sync-github.mjs
 *
 * Reads  data/projects.mapping.json  (hand-edited: stage, tags, icon, slot...)
 * Writes data/projects.mapping.json  (newly discovered repos appended for triage)
 * Writes data/projects.json          (merged output consumed by the browser)
 *
 * Existing mapping entries are never overwritten, only new repo keys are added.
 * Set GITHUB_TOKEN (env or .env) to raise the API rate limit and include private repos.
 */
import { readFileSync, writeFileSync } from "node:fs";
import { fileURLToPath } from "node:url";
import { dirname, join } from "node:path";

const root = join(dirname(fileURLToPath(import.meta.url)), "..");
const MAPPING_PATH = join(root, "data/projects.mapping.json");
const OUTPUT_PATH = join(root, "data/projects.json");

/** Load KEY=VALUE pairs from .env into process.env (does not override existing vars). */
function loadDotEnv() {
  try {
    const text = readFileSync(join(root, ".env"), "utf8");
    for (const line of text.split("\n")) {
      const trimmed = line.trim();
      if (!trimmed || trimmed.startsWith("#")) continue;
      const eq = trimmed.indexOf("=");
      if (eq <= 0) continue;
      const key = trimmed.slice(0, eq).trim();
      let value = trimmed.slice(eq + 1).trim();
      if (
        (value.startsWith('"') && value.endsWith('"')) ||
        (value.startsWith("'") && value.endsWith("'"))
      ) {
        value = value.slice(1, -1);
      }
      if (process.env[key] === undefined) process.env[key] = value;
    }
  } catch (err) {
    if (err.code !== "ENOENT") throw err;
  }
}

const LANGUAGE_ICONS = {
  TypeScript: "📘",
  JavaScript: "📒",
  PHP: "🐘",
  Python: "🐍",
  Go: "🔵",
  Rust: "🦀",
  Java: "☕",
  "C#": "🎯",
  "C++": "⚙️",
  C: "⚙️",
  Ruby: "💎",
  Vue: "💚",
  HTML: "🌐",
  CSS: "🎨",
  Shell: "🐚",
  ASP: "📄",
};

function readMapping() {
  try {
    return JSON.parse(readFileSync(MAPPING_PATH, "utf8"));
  } catch (err) {
    if (err.code === "ENOENT") {
      throw new Error(
        `Mapping introuvable: ${MAPPING_PATH}\nCree-le d'abord (voir le README).`
      );
    }
    throw new Error(`Mapping illisible (${MAPPING_PATH}): ${err.message}`);
  }
}

async function fetchRepos(username, token) {
  const headers = {
    Accept: "application/vnd.github+json",
    "User-Agent": "eddymontus-inventory-sync",
    "X-GitHub-Api-Version": "2022-11-28",
  };
  if (token) headers.Authorization = `Bearer ${token}`;

  // With a token, /user/repos also returns private repos and collaborations.
  const base = token
    ? "https://api.github.com/user/repos?affiliation=owner"
    : `https://api.github.com/users/${username}/repos?`;

  const repos = [];
  for (let page = 1; ; page++) {
    const res = await fetch(`${base}&per_page=100&sort=pushed&page=${page}`, {
      headers,
    });
    if (!res.ok) {
      const hint =
        res.status === 403
          ? " (rate limit atteint, definis GITHUB_TOKEN)"
          : res.status === 404
            ? ` (utilisateur "${username}" introuvable)`
            : "";
      throw new Error(`GitHub API ${res.status}${hint}`);
    }
    const batch = await res.json();
    repos.push(...batch);
    if (batch.length < 100) break;
  }
  return repos.map((r) => ({
    repo: r.full_name,
    name: r.name,
    githubUrl: r.html_url,
    homepage: r.homepage?.trim() || null,
    description: r.description?.trim() || null,
    language: r.language || null,
    stars: r.stargazers_count ?? 0,
    fork: Boolean(r.fork),
    archived: Boolean(r.archived),
    private: Boolean(r.private),
    pushedAt: r.pushed_at || null,
  }));
}

function slugify(name) {
  return name
    .toLowerCase()
    .replace(/[^a-z0-9]+/g, "-")
    .replace(/^-|-$/g, "");
}

/** Append repos that no mapping entry claims, so they can be triaged by hand. */
function addNewRepos(mapping, repos) {
  const claimed = new Set(
    Object.values(mapping.items)
      .map((item) => item.repo)
      .filter(Boolean)
  );
  const added = [];

  for (const repo of repos) {
    if (claimed.has(repo.repo)) continue;

    let id = slugify(repo.name);
    while (mapping.items[id]) id = `${id}-repo`;

    const entry = { repo: repo.repo, stage: "loot", tags: [] };
    if (repo.archived) entry.stage = "archived";
    if (repo.fork) {
      entry.tags.push("fork");
      if (mapping.meta.hideForks) entry.hidden = true;
    }

    mapping.items[id] = entry;
    added.push({ id, repo: repo.repo, fork: repo.fork });
  }

  return added;
}

function buildItems(mapping, repos) {
  const repoByFullName = new Map(repos.map((r) => [r.repo, r]));
  const items = [];

  for (const [id, item] of Object.entries(mapping.items)) {
    if (item.hidden) continue;

    const repo = item.repo ? repoByFullName.get(item.repo) : null;
    if (item.repo && !repo) {
      console.warn(`  ! ${id}: repo "${item.repo}" absent de GitHub`);
    }

    const stage = item.stage ?? null;
    if (stage && !mapping.meta.stages[stage]) {
      console.warn(`  ! ${id}: stage inconnu "${stage}"`);
    }

    items.push({
      id,
      name: item.name ?? repo?.name ?? id,
      icon:
        item.icon ?? (repo?.language && LANGUAGE_ICONS[repo.language]) ?? "📦",
      url: item.url ?? repo?.homepage ?? repo?.githubUrl ?? null,
      lore: item.lore ?? repo?.description ?? null,
      stage,
      tags: item.tags ?? [],
      slot: item.slot ?? null,
      repo: item.repo ?? null,
      githubUrl: repo?.githubUrl ?? null,
      language: repo?.language ?? null,
      stars: repo?.stars ?? 0,
      pushedAt: repo?.pushedAt ?? null,
    });
  }

  const rank = (item) => mapping.meta.stages[item.stage]?.sort ?? 99;
  return items.sort(
    (a, b) => rank(a) - rank(b) || a.name.localeCompare(b.name, "fr")
  );
}

async function main() {
  loadDotEnv();
  const mapping = readMapping();
  const { githubUser } = mapping.meta;
  const token = process.env.GITHUB_TOKEN;

  console.log(`Sync GitHub pour ${githubUser}${token ? " (authentifie)" : ""}`);
  const repos = await fetchRepos(githubUser, token);
  console.log(`  ${repos.length} repos recuperes`);

  const added = addNewRepos(mapping, repos);
  if (added.length) {
    writeFileSync(MAPPING_PATH, JSON.stringify(mapping, null, 2) + "\n");
    console.log(`  ${added.length} nouveaux repos ajoutes au mapping :`);
    for (const { id, repo, fork } of added) {
      console.log(`    + ${id} <- ${repo}${fork ? " (fork, masque)" : ""}`);
    }
  }

  const items = buildItems(mapping, repos);
  writeFileSync(
    OUTPUT_PATH,
    JSON.stringify(
      {
        generatedAt: new Date().toISOString(),
        githubUser,
        stages: mapping.meta.stages,
        tags: mapping.meta.tags,
        items,
      },
      null,
      2
    ) + "\n"
  );

  const untriaged = items.filter((i) => i.stage === "loot");
  console.log(`  ${items.length} items ecrits dans data/projects.json`);
  if (untriaged.length) {
    console.log(
      `\n${untriaged.length} item(s) a classer (stage "loot") dans data/projects.mapping.json :`
    );
    for (const item of untriaged) console.log(`    ? ${item.id}`);
  }
}

main().catch((err) => {
  console.error(`\nEchec de la sync: ${err.message}`);
  process.exit(1);
});
