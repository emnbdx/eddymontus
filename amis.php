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
					<a href="http://www.emreparation.fr" target="_blank" title="Un des meilleurs services de réparation PC et téléphone"><img src="img/emreparation.jpg" /></a>
					<a href="http://www.lamaisondesvignes.fr" target="_blank" title="Une super chambre d'hôtes"><img src="img/lamaisondesvignes.jpg" /></a>
					<a href="http://www.legitemarengo.com" target="_blank" title="Un super gite"><img src="img/legitemarengo.jpg" /></a>
					<a href="http://www.jetalize.fr" target="_blank" title="De la location de Jet Ski à La Tremblade"><img src="img/jetalize.jpg" /></a>
					<a href="http://www.air3bordeaux.org" target="_blank" title="Mon ancienne équipe de course à pied"><img src="img/air3bordeaux.jpg" /></a>
				</center>
			</div>
			
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>