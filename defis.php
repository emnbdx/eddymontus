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
				Comme beaucoup le savent, je suis un gars qui se lance continuellement de nouveaux défis. Ici je liste ceux que je me suis lancés et leur avancement !

				<div>
					<h3>Défis effectués</h3>
					<p><input type="checkbox" disabled> - Boire 10 chimay bleue</p>
					<p><input type="checkbox" disabled checked> - Faire le ramadan</p>
					<p><input type="checkbox" disabled checked> - Ne pas manger pendant une semaine</p>
					<p><input type="checkbox" disabled checked> - Construire un joli lustre <a href="http://www.instructables.com/id/How-to-save-1164407-on-a-designer-lighting-fixtu/?ALLSTEPS" target="_blank">comme celui-ci</a></p>					
					<p><input type="checkbox" disabled checked> - Courir mon premier Marathon</p>
				</div>
				<div>
					<h3>Défis en cours ou à venir</h3>
					<p><input type="checkbox" disabled> - Courir un marathon <a href="https://www.helloasso.com/utilisateurs/eddy-montus@gmail-com/collectes/mon-marathon-de-bordeaux-au-profit-de-la-fondation-des-femmes" target="_blank">en soutenant une association</a></p>
				</div>
			</div>
			
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>