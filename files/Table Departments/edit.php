<?php

 function renderForm($id,$department, $error)
 {
 ?>
 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
 <html>
 <head>
 <title>Edit Record</title>
 </head>
 <body>
 <?php 
 if ($error != '')
 {
 echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
 }
 ?> 
 
 <form action="" method="post">
 <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <strong>Department: *</strong> <input type="text" name="department" value="<?php echo $department; ?>"/><br/>
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
 if (is_numeric($_POST['id']))
 {
 $id = $_POST['id'];
 $department = mysql_real_escape_string(htmlspecialchars($_POST['department']));
 
 
 if ($department == '')
 {
 $error = 'ERROR: Please fill in the  required field!';
 
 renderForm($id, $department, $error);
 }
 else
 {
 mysql_query("UPDATE $tbl_departments SET name='$department'  WHERE id='$id'")
 or die(mysql_error()); 
 
 header("Location: view.php"); 
 }
 }
 else
 {
 echo 'Error!';
 }
 }
 else
 {
 if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
 {
 $id = $_GET['id'];
 $result = mysql_query("SELECT * FROM $tbl_departments WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 
 if($row)
 {
 $department = $row['name'];
 
 renderForm($id, $department, '');
 }
 else
 
 {
 echo "No results!";
 }
 }
 else
 {
 echo 'Error!';
 }
 }
?>