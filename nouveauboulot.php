<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	
	<style type="text/css"> 		
		ul { list-style-image: none; }
	
		#countdown-blog {color:#000;height:200px; margin-left: 40px;}
		#countdown-blog div.set{float:left; padding:0 50px 0 50px;}
		#countdown-blog h2{text-align:center; font-size:18px}
		#countdown-blog ul{list-style-type:none;height:103px;padding:20px 0px 5px}
		#countdown-blog li{float:left;background:url('img/filmstrip_countdown_9-0.png') 0 0 no-repeat;width:53px;height:103px}
		#countdown-blog li.comma{background:url('img/comma.png') 2px 75px no-repeat;width:12px}
		#countdown-blog div.separator{float:left; font:80px Arial,sans-serif; height:103px; padding:25px 0 0;}
	</style>
	
	<body>	
		<div class="container">
			<div id="countdown-blog" class="content"></div>
			
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
	
		<?php $master->getFooter(); ?>
		
		<script src="js/countdown.min.js"></script>
	</body>
</html>