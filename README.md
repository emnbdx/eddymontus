# eddymontus

My personnal website — a Minecraft-themed portfolio. Static site, no build step,
no runtime dependency.

## Inventaire des projets

La page affiche une hotbar (9 raccourcis) et un inventaire facon coffre
(touche `E`) alimentes par `data/projects.json`.

### Comment un etat est represente

L'etat d'un projet suit deux axes distincts :

- **`stage`** — ou en est le projet, une seule valeur. Rendu par la couleur du
  nom dans l'infobulle (la palette de raretes de Minecraft) et par une barre de
  durabilite sous l'icone, verte quand pleine et rouge quand basse.
- **`tags`** — ce qu'il reste a faire, plusieurs valeurs possibles. Rendu par de
  petits badges dans le coin de la case.

Les etapes vont de `loot` (pas encore trie) a `prod`, qui recoit en plus le
reflet d'enchantement. Le nombre de stars GitHub s'affiche comme un compteur de
pile.

### Mettre a jour l'inventaire

```sh
npm run sync          # ou: node scripts/sync-github.mjs
```

Le script lit les repos publics de GitHub, puis :

1. ajoute dans `data/projects.mapping.json` chaque nouveau repo, en `stage:
   "loot"`, sans jamais toucher aux entrees existantes ;
2. regenere `data/projects.json`, le fichier que lit le navigateur ;
3. liste en fin de sortie les items restant a classer.

Definis `GITHUB_TOKEN` (export shell, ou fichier `.env` a la racine) pour
lever la limite de l'API et inclure les repos prives :

```env
GITHUB_TOKEN=ghp_...
```

### Ajuster le mapping

Tout se regle a la main dans `data/projects.mapping.json`, une entree par case
d'inventaire :

```json
"localarcade": {
  "name": "LocalArcade",
  "icon": "🎮",
  "url": "https://exemple.fr",
  "lore": "Arcade locale",
  "stage": "to-prod",
  "tags": ["todo"],
  "slot": 5,
  "repo": "emnbdx/localarcade",
  "hidden": false
}
```

Tous les champs sont optionnels. `slot` (1-9) place l'item dans la hotbar,
`repo` le relie a un depot GitHub pour recuperer langage, stars, description et
date de dernier push, `hidden` le sort de l'inventaire. Une entree sans `stage`
est un simple lien, pas un projet.

Relance la sync apres chaque modification pour regenerer `data/projects.json`.

## Developpement local

```sh
python3 -m http.server 8000
```
