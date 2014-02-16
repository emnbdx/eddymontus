<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	<body>
		<div class="container_12">
			<!-- E --> 
			<div class="grid_1">
				<div class="cube anim color1"></div>
				<a href="cv.php" class="cube anim color_special"><p>CV</p></a>
				<div class="cube anim color3"></div>
				<div class="cube anim color4"></div>
				<div class="cube anim color2"></div>
				<div class="cube anim color1"></div>
			</div>
			<div class="grid_1">
				<div class="cube anim color3"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color2"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color4"></div>
			</div>
			<div class="grid_1">
				<div class="cube anim color2"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color4"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<a href="blog.php" class="cube anim color_special"><p>BLOG</p></a>
			</div>
			<div class="grid_1">
				<div class="cube anim color1"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color2"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color3"></div>
			</div>
			<div class="grid_1 suffix_2">
				<div class="cube anim color4"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color1"></div>
			</div>
			
			<!-- M --> 
			<div class="grid_1">
				<a href="amis.php" class="cube anim color_special"><p>AMIS</p></a>
				<div class="cube anim color2"></div>
				<div class="cube anim color3"></div>
				<div class="cube anim color2"></div>
				<div class="cube anim color1"></div>
				<div class="cube anim color4"></div>
			</div>
			<div class="grid_1">
				<div class="cube color_normal"></div>
				<div class="cube anim color3"></div>
				<div class="cube anim color4"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
			</div>
			<div class="grid_1">
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube anim color1"></div>
				<a href="nouveauboulot.php" class="cube anim color_special"><p>JOB</p></a>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
			</div>
			<div class="grid_1">
				<div class="cube color_normal"></div>
				<div class="cube anim color2"></div>
				<div class="cube anim color4"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
				<div class="cube color_normal"></div>
			</div>
			<div class="grid_1">
				<div class="cube anim color4"></div>
				<div class="cube anim color1"></div>
				<div class="cube anim color2"></div>
				<div class="cube anim color4"></div>
				<div class="cube anim color1"></div>
				<div class="cube anim color2"></div>
				<!--<a href="/LBCAlerterWeb" class="cube anim color2" rel="nofollow"></a>-->
			</div>
		</div>
		
		<?php $master->getFooter(); ?>
	</body>
</html>