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
					foreach (scandir($BLOG_ITEM_DIR, 1) as $file) {
						$filePath = $BLOG_ITEM_DIR . $file;
						if(!is_dir($filePath)) {
							//Get info from name
							list($date, $title) = explode('_', pathinfo($filePath)[filename]);

							echo '<div class="content">';
							echo "	<h1>" . $title . "</h1>";
							echo "Le " . DateTime::createFromFormat('Ymd', $date)->format('d/m/Y') . "<br/><br/>";
							echo '	<div class="text">';
							echo file_get_contents($filePath);
							echo '	</div>';									
							echo "</div>";
						}
					}
				?>
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>