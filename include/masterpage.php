<?php
class MasterPage {

	public function getHead() {
		echo '<head>';
		echo '	<title>Eddy MONTUS</title>';
		
		echo '	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">';
		echo '	<link href="css/global.min.css" rel="stylesheet">';
		echo '	<link href="css/grid.min.css" rel="stylesheet">';

		echo '</head>';
	}
	
	public function getFooter() {
		echo '<div id="footer" class="ignoreMe">';
		echo '	<div id="f_content" class="ignoreMe">';
		echo '		© 2013 - ' . date("Y") . ' by Eddy MONTUS';
		echo '		<p class="ignoreMe">';
		echo '			<a href="https://github.com/emnbdx" class="cube_link ignoreMe" rel="nofollow" target="_blank">';
		echo '				<img src="img/github_logo.png" alt="logo github" class="anim" />';
		echo '			</a>';
		echo '		</p>';
		echo '	</div>';
		echo '</div>';

		echo '	<script src="https://code.jquery.com/jquery.min.js"></script>';
		echo '	<script type="text/javascript" src="js/jGravity-min.js"></script>';
		
		echo '<script>';
	  	echo '	(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){';
	  	echo '	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),';
	  	echo '	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)';
	  	echo '	})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');';
	  	echo '	ga(\'create\', \'UA-40535132-1\', \'auto\');';
	  	echo '	ga(\'send\', \'pageview\');';
		echo '</script>';
	}
}
?>