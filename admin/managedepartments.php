<?php
 include("config/dbinfo.php");
 include("config/settings.php");
 include("functions.php");
?>
<!doctype html>
<html>
	<head>
		<title>Hospital India</title>
		<?php load_css()?>
		<?php load_scripts()?>
	</head>
	<body class="container_16">
		<?php load_header(); ?>
		<section class="grid_16">
			<div class="container">
			 <div class="grid_3" style="width: 195px;">
			 	<ul class="sidenavigation">
			 		<li><a href="#">Add Department</a></li>
			 	</ul>
			 </div>	
			 <div class="grid_12">
			 	<div style="margin:10px 20px;"><?php show_departments(); ?></div>
			 </div>
			</div>
		</section>
		<?php load_footer(); ?>
	</body>
</html>