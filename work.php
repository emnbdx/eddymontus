<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	<body>
		<div class="container">
			<div class="content friends">
				<center>
					<a href="https://www.jetalize.fr" target="_blank" title="De la location de Jet Ski à La Tremblade"><img src="img/jetalize.jpg" /></a>
					<a href="https://www.air3bordeaux.org" target="_blank" title="Mon ancienne équipe de course à pied"><img src="img/air3bordeaux.jpg" /></a>
					<a href="https://www.ellestmanuelle.fr" target="_blank" title="Le très jolie site d'une copine artiste"><img src="img/ellestmanuelle.jpg" /></a>
					<a href="https://www.madietenligne.fr" target="_blank" title="Collectif de diététiciens et diététiciennes"><img src="img/madietenligne.jpg" /></a>
				</center>
			</div>
			
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>
