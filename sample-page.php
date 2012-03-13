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
				<div align="center" style="margin:100px auto;font-size: 40px;"><?php echo get_totalstates(); ?><b>States</b> | <?php echo get_totalcity(); ?> <b>City</b> | <?php echo get_totalhospitals(); ?> <b>Hospitals</b></div>
			</div>
		</section>
		<?php load_footer(); ?>
	</body>
</html>