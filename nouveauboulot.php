<?php
	require_once('include/masterpage.php');
	$master = new MasterPage();
?>

<!DOCTYPE html>
<html>
	<?php $master->getHead(); ?>
	
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" />
    <link rel="stylesheet" href="css/jquery.countdown.css" />
	
	<style>
		#note{
			color: #FFF;
			font-size: 12px;
			margin: 0 auto;
			padding: 4px;
			text-align: center;
			text-shadow: 1px 1px 0 rgba(255, 255, 255, 0.3);
			width: 400px;
		}
	</style>
	
	<body>	
		<div class="container">
			<div id="countdown"></div>
			<p id="note"></p>
			
			<a class="btn" href="index.php"><i class="icon-arrow-left"></i> Retour</a>
		</div>
	
		<?php $master->getFooter(); ?>
		
		<script src="script/jquery.countdown.js"></script>
		<script>
			$(function(){
				var note = $('#note'),
					ts = new Date(2014, 1, 25);
								
				$('#countdown').countdown({
					timestamp	: ts,
					callback	: function(days, hours, minutes, seconds){
						
						var message = "";
						
						message += days + " day" + ( days==1 ? '':'s' ) + ", ";
						message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
						message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
						message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
						
						note.html(message);
					}
				});
				
			});
		</script>
	</body>
</html>