<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	<body>	
		<div class="container_12 ignoreMe">
			<div class="grid_5 suffix_2 ignoreMe">
				<div class="content c_color1">
					Compétences:<br/>
					<div class="text ignoreMe">
						C#, .NetFramework 2/4, ASP.NET, Entity Framework, MVC 4<br/>
						Java, servlet, jsp/struts<br/>
						SQLServer, MySQL<br/>
						PHP 5, HTML5, Javascript
					</div>
				</div>
				<div class="content c_color2">
					Expériences:<br/>
					<div class="text ignoreMe">
						2008 - Tessi Technologies<br/>
						avril/juin 2008 - Stage hôpital de Rochefort<br/>
						octobre/avril 2008 - Chef de projet scolaire
					</div>
				</div>
				
				<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
			</div>
			
			<div class="grid_5 ignoreMe">
				<div class="content c_color3">
					Études:<br/>
					<div class="text ignoreMe">
						2008 - IUT informatique option informatique embarquée<br/>
						2006 - Bac SSI mention AB
					</div>
				</div>
				<div class="content c_color4">
					Centres d'intérêt:<br/>
					<div class="text ignoreMe">
						course à pieds, natation, vélo, musculation<br/>
						mécanique<br/>
						musique
					</div>
				</div>
				
				<div id="jGravity" class="btn">Make This Fun</div>
			</div>
		</div>
		
		

		<?php $master->getFooter(); ?>
		
		<script>
			$(document).ready(function() {
			$("#jGravity").click(function() {
				$('body').jGravity({
					target: 'everything',
					ignoreClass: 'ignoreMe',
					weight: 25,
					depth: 3,
					drag: true
				});
			});
			});
		</script>
	</body>
</html>