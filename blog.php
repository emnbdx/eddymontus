<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
	
	$BLOG_ITEM_DIR = "item/";
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	<body>
		<div class="container">
				<?php				
					$files = array();
					
					if (is_dir($BLOG_ITEM_DIR)
						&& $dh = opendir($BLOG_ITEM_DIR)) {
						while (($file = readdir($dh)) !== false) {
							
							$filePath = $BLOG_ITEM_DIR . $file;
							if(!is_dir($filePath)) {
								//Get info from name
								list($date, $title) = split('_', pathinfo($filePath)[filename]);

								//Add item to array
								$tempArray = array("title" => $title,
													"date" => DateTime::createFromFormat('Ymd', $date)->format('d/m/Y'),
													"content" => file_get_contents($filePath));
								array_unshift($files, $tempArray);
							}
						}
						closedir($dh);
					}
					
					$arrayLength = count($files);
					for ($i = 0; $i < $arrayLength; $i++) {
						echo '<div class="content">';
						echo "	<h1>" . $files[$i]["title"] . "</h1>";
						echo "Le " . $files[$i]["date"] . "<br/><br/>";
						echo '	<div class="text">';
						echo $files[$i]["content"];
						echo '	</div>';									
						echo "</div>";
					}
				?>
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>