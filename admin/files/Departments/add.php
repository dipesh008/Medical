<?php

 function renderForm($department,$error)
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
 <strong>Department: *</strong> <input type="text" name="department" value="<?php echo $department; ?>" /><br/>
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
 $department = mysql_real_escape_string(htmlspecialchars($_POST['department']));

 if ($department == '')
 {
 $error = 'ERROR: Please fill in the required field!';
 renderForm($department, $error);
 }
 
 else
 {
 mysql_query("INSERT into $tbl_departments (name) values('$department') ")
 or die(mysql_error()); 
 
 header("Location: view.php"); 
 }
 }
 else
 {
 renderForm('','','');
 }
?> 