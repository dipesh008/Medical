<?php

 function renderForm($state,$error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>New Record</title>
 </head>
 <body>
 <?php 
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <div>
 <strong>State: *</strong> <input type="text" name="state" value="<?php echo $state; ?>" /><br/>
 <p>* Required</p>
 <input type="submit" name="submit" value="Submit">
 </div>
 </form> 
 </body>
 </html>
 <?php 
 }
 
 include('dbinfo.php');
 
 if (isset($_POST['submit']))
 { 
 $state = mysql_real_escape_string(htmlspecialchars($_POST['state']));

 if ($state == '')
 {
 $error = 'ERROR: Please fill in the required field!';
 renderForm($state, $error);
 }
 
 else
 {
 mysql_query("INSERT into $tbl_states (name) values('$state') ")
 or die(mysql_error()); 
 
 header("Location: view.php"); 
 }
 }
 else
 {
 renderForm('','','');
 }
?> 