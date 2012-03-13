<?php

 function renderForm($id, $state, $error)
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
 <strong>State: *</strong> <input type="text" name="state" value="<?php echo $state; ?>"/><br/>
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
 $state = mysql_real_escape_string(htmlspecialchars($_POST['state']));
 
 
 if ($state == '')
 {
 $error = 'ERROR: Please fill in the  required field!';
 
 renderForm($id, $state, $error);
 }
 else
 {
 mysql_query("UPDATE $tbl_states SET name='$state',updated_at=now()  WHERE id='$id'")
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
 $result = mysql_query("SELECT * FROM $tbl_states WHERE id=$id")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 
 if($row)
 {
 $state = $row['name'];
 
 renderForm($id, $state, '');
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