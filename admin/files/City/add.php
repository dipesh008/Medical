<?php


 function renderForm($sid,$city,$error)
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
 
<?php
 include('dbinfo.php');
 
                $result = mysql_query("SELECT id,name FROM $tbl_states")
                or die(mysql_error()); 
				
				$options="Choose";
				while($row = mysql_fetch_array( $result )) 
				{
				$id=$row["id"];
  	            $name=$row["name"];
  	            $options.="<option value=\"$id\">".$name."</option>";
				}
 ?>
 
 
 <form action="" method="post">
 <div>
 <table border="0" cellpadding="2" cellspacing="2">
 <tr>
     <td>State</td>
	 <td>
	     <select name="sid">
	     <option value="$options">
		 <?php echo $options;?>
		 </option>
		 </select>
	 </td>
 </tr>
 	 	 
 <tr>
     <td>City:*</td>
	 <td><input type="text" name="city" value="<?php echo $city; ?>" /></td>
  </tr>
  
  </table>

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
 $sid=mysql_real_escape_string((int) $_POST['sid']);
 $city = mysql_real_escape_string(htmlspecialchars($_POST['city']));

 if ($city == '' || $sid == '')
 {
 $error = 'ERROR: Please fill in the required field!';
 renderForm($sid,$city, $error);
 }
 
 else
 {
 mysql_query("INSERT into $tbl_city (state_id,name)  values('$sid','$city') ")
 or die(mysql_error()); 
 
 header("Location: view.php"); 
 }
 }
 else
 {
 renderForm('','','');
 }
?> 