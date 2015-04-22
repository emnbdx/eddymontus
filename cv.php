<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	<body>	
		<div class="container_12">
			<div class="grid_5 suffix_2">
				<div class="content c_color1 gravity">
					Compétences:<br/>
					<div class="text">
						C#, ASP.NET, Entity Framework, MVC<br/>
						Java, servlet, jsp/struts<br/>
						SQLServer, MySQL<br/>
						PHP, HTML, Javascript, CSS
					</div>
				</div>
				<div class="content c_color2 gravity">
					Expériences:<br/>
					<div class="text">
						2014 - HelloAsso<br/>
						2008/2014 - Tessi Technologies<br/>
						avril/juin 2008 - Stage hôpital de Rochefort<br/>
						octobre/avril 2008 - Chef de projet scolaire
					</div>
				</div>
				
				<a class="btn gravity" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
			</div>
			
			<div class="grid_5">
				<div class="content c_color3 gravity">
					Études:<br/>
					<div class="text">
						2008 - IUT informatique option informatique embarquée<br/>
						2006 - Bac SSI mention AB
					</div>
				</div>
				<div class="content c_color4 gravity">
					Centres d'intérêt:<br/>
					<div class="text">
						course à pieds, natation, vélo, musculation<br/>
						mécanique<br/>
						musique
					</div>
				</div>
				
				<div id="jGravity" class="btn gravity">Make This Fun</div>
			</div>
		</div>
		
		

		<?php $master->getFooter(); ?>
		
		<script>
			$(document).ready(function() {
			$("#jGravity").click(function() {
				$('body').jGravity({
					target: '.gravity',
					depth: 3,
					drag: true
				});
			});
			});
		</script>
	</body>
</html>