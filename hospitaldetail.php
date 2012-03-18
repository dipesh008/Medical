<?php
 include("config/dbinfo.php");
 include("config/settings.php");
 include("functions.php");
 if(isset($_GET['id']))
 {
      $hospital_id=$_GET['id'];
      $hospital_name=$_GET['name'];
      $hospital_city=$_GET['city'];
 }
 else{
     header('location:index.html');
 }
 
?>
<!doctype html>
<html>
	<head>
        <title><?php echo get_hospitalname($hospital_id); ?> - Hospital India - Doctors, Phone Number, Hospital Ratings & List, Appointments</title>
        <?php load_css()?>
        <?php load_scripts($ENV)?>
    </head>
	<body class="container_16">
		<?php load_header(); ?>
		<section class="grid_16">
			<div class="container">
			 <div class="grid_3" style="width: 195px;">
			 	<ul class="sidenavigation">
			 		<li><a href="#">Hospitals by City</a></li>
			 	</ul>
			 </div>	
			 <div class="grid_12">
			 	<div style="margin:20px 30px;"><?php echo show_hospital($hospital_id); ?></div>
			 </div>
			</div>
		</section>
		<?php load_footer(); ?>
	</body>
</html>