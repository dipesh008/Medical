<?php
include("config/dbinfo.php");
include("config/settings.php"); 
include("functions.php");
?>
<!doctype html>
<html>
    <head>
        <title>Hospital India - Doctors, Phone Number, Hospital Ratings & List, Appointments</title>
        <meta name="description" content="Hospital India - Doctors, Phone Number, Hospital Ratings & List, Appointments" />
        <meta name="keywords" content="Hospitals,india,reviews,doctors,list,phone number,name,best,top,ratings,appointment" />
        <?php load_css()?>
        <?php load_scripts($ENV)?>
    </head>
    <body class="container_16">
        <?php load_header(); ?>
        <section class="grid_16">
            <div class="container">
                <div class="grid_4 alpha">
                   <?php states_list();?>
                </div>
                <div class="grid_8 omega">
                    <div align="center" style="margin:50px auto;font-size: 30px;"><?php echo get_totalstates(); ?> <b>States</b> | <?php echo get_totalcity(); ?> <b>City</b> | <?php echo get_totalhospitals(); ?> <b>Hospitals</b></div>
                    <?php display_hospitals();?>
                  
                </div>
                <div class="grid_4 omega">
                     <?php city_list();?>
                </div>
                
        </section>
        <?php load_footer(); ?>
    </body>
</html>