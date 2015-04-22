<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	<body>
		<div class="container">
			<div class="content">
				<center>
					<a href="http://www.emreparation.fr" target="_blank">Un des meilleurs services de réparation PC et téléphone</a><br/>
					<a href="http://lamaisondesvignes.free.fr" target="_blank">Une super chambre d'hôtes</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="http://www.legitemarengo.com" target="_blank">gite</a><br/>
					<a href="http://jetalize.fr" target="_blank">De la location de Jet Ski à La Tremblade</a><br/>
					<a href="http://www.air3bordeaux.org" target="_blank">Mon ancienne équipe de course à pied</a>
				</center>
			</div>
			
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>