<?php
include("config/dbinfo.php");
include("config/settings.php"); 
include("functions.php");
?>
<?php
 $name=$_GET['name'];
 $id=$_GET['id'];
$state=str_replace('_', ' ', $name);
if(is_state($id,$state))
{   
    //continue
}
else{
    header('location:index.html');
}
?>
<!doctype html>
<html>
    <head>
        <title>Hospital in <?php echo $state; ?> , India - Doctors, Phone Number, Hospital Ratings & List, Appointments</title>
        <meta name="description" content="Hospital in <?php echo $state; ?>  India - Doctors, Phone Number, Hospital Ratings & List, Appointments" />
        <meta name="keywords" content="Hospitals,<?php echo $state; ?>,india,reviews,doctors,list,phone number,name,best,top,ratings,appointment" />
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
                    <div align="center" style="margin:50px auto;font-size: 30px;"><b>Hospitals in <?php echo $state; ?></b></div>
                    <?php hospitals_by_state($id,$state);?>
                  
                </div>
                <div class="grid_4 omega">
                     <?php city_list();?>
                </div>
                
        </section>
        <?php load_footer(); ?>
    </body>
</html>