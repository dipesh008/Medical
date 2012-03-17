<?php
 
                function states_option($selid)
			    {
				include('dbinfo.php');
				
                $result = mysql_query("SELECT * FROM $tbl_states")
                or die(mysql_error()); 
				
				
	
				$options='<options value="NULL" >Choose</option>';
				while($row = mysql_fetch_array( $result)) 
				{
				
				$id=$row['id'];
  	            $name=$row['name'];
				
				
				if($selid == $id)
				{
				 $options.='<option value='.$id.' selected >'.$name.'</option>';
				}
				
				else
				{
				 $options.='<option value='.$id.'>'.$name.'</option>';
				}
				
				
				}
				 return $options;
				}
 ?>
 
 
<?php
 function renderForm($id,$sid,$city,$error)
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
 <table border="0" cellpadding="2" cellspacing="2">
 <tr>
     <td>State</td>
	 <td>
	     <select name="sid">
	     
		 <?php $temp=states_option($sid);
			         echo $temp;
					  ?>
		 
		 </select>
	 </td>
 </tr>
 	 	 
 <tr>
     <td>City:*</td>
	 <td><input type="text" name="city" value="<?php echo "$city"; ?>" /></td>
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
 if (is_numeric($_POST['id']))
 {
 $id = $_POST['id'];
 $sid = mysql_real_escape_string((int) $_POST['sid']);
 $city = mysql_real_escape_string(htmlspecialchars($_POST['city']));
 
 
 if ($city == '' || $sid == '')
 {
 $error = 'ERROR: Please fill in the  required fields!';
 
 renderForm($id,$sid,$city, $error);
 }
 else
 {
 
 mysql_query("UPDATE $tbl_city SET state_id='$sid',name='$city',updated_at=now()  WHERE id='$id'")
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
 $result = mysql_query("SELECT * FROM $tbl_city WHERE id='$id' ")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 
 if($row)
 {
 $sid = $row['state_id'];
 $city = $row['name'];
 
 renderForm($id,$sid,$city,'');
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