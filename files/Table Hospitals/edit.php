<?php
  
                
              function states_options($selid)
			   {
			   include('dbinfo.php');
                $result = mysql_query("SELECT id,name FROM $tbl_states")
                or die(mysql_error()); 
				
				$options='<options value="NULL">Choose</option>';
				while($row = mysql_fetch_array( $result )) 
				{
				
				$id=$row["id"];
  	            $sname=$row["name"];
				
				if($selid == $id)
				{
				 $options.='<option value='.$id.' selected >'.$sname.'</option>';
				}
				
				else
				{
				 $options.='<option value='.$id.'>'.$sname.'</option>';
				}
								
				}
				 return $options;
				}
 ?>

<?php
  
                
              function city_options($selid)
			   {
			   include('dbinfo.php');
                $result = mysql_query("SELECT id,name FROM $tbl_city")
                or die(mysql_error()); 
				
				$optionsc='<options value="NULL">Choose</option>';
				while($row = mysql_fetch_array( $result )) 
				{
				
				$id=$row["id"];
  	            $cname=$row["name"];
				
				if($selid == $id)
				{
				 $optionsc.='<option value='.$id.' selected >'.$cname.'</option>';
				}
				
				else
				{
				 $optionsc.='<option value='.$id.'>'.$cname.'</option>';
				}
								
				}
				 return $optionsc;
				}
 ?>


<?php

 function renderForm($id,$name,$state,$city,$address,$email,$phone,$oinfo,$error)
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
 echo '<div style="padding:4px; border:1px solid red; color:red";>'.$error.'</div>';
 }
 ?> 
 
   
  <form action="" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>"/>
 <div>
 <table border="1">
 
 
    <tr>
       <td>Name: *</td>
	   <td><input type="text" name="name" value="<?php echo $name; ?>" /></td>
	</tr>
 
   <tr>
	    <td>State: *</td>
		    <td>
			   <select name="state">
			  
			   <?php $temp=states_options($state);
			         echo $temp; ?>
			   
			   </select>     		
			</td>
	 </tr>
	 
	 
	 
	 <tr>
	    <td>City: *</td>
		    <td>
			   <select name="city">
			   
			   <?php $temp=city_options($city);
			         echo $temp; ?>
			  
			   </select>     		
			</td>
	 </tr>
   
   <tr>					  
        <td>Address: *</td>
		<td><textarea rows="5" cols="12" name="address"><?php echo $address; ?></textarea></td>
	</tr>	
	
	
	<tr>
	   <td>Email_Id: *</td>
	   <td><input type="text" name="email" value="<?php echo $email; ?>" /></td>
    </tr>
	
	<tr>
	   <td>Phone Number: *</td>
	   <td><input type="text" name="phone" value="<?php echo $phone; ?>" /></td>
    </tr>

    <tr>					  
        <td>Other Info.: *</td>
		<td><textarea rows="5" cols="12" name="oinfo"><?php echo $oinfo; ?></textarea></td>
	</tr>

	  
	  </table>
 <p>* required</p>
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
 $sub = $_POST['submit'];
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $state = mysql_real_escape_string((int) $_POST['state']);
 $city = mysql_real_escape_string((int) $_POST['city']);
 $address = mysql_real_escape_string(htmlspecialchars($_POST['address']));
 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $phone=mysql_real_escape_string($_POST['phone']);
 $oinfo = mysql_real_escape_string(htmlspecialchars($_POST['oinfo']));
 
 
 if ($name == '' || $state == '' ||  $city == '' ||  $address == '' || $email == '' ||  $phone == '' || $oinfo == '')
 {
 
 $error = 'ERROR: Please fill in all required fields!';
 
 
 renderForm($id,$name,$state,$city,$address,$email,$phone,$oinfo,$error);
 }
 else
 {
 mysql_query
 ("UPDATE $tbl_hospitals  SET name='$name',state_id='$state',city_id='$city',address='$address',email='$email',phone='$phone',other_info='$oinfo',updated_at=now() WHERE id='$id' ")
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
 $result = mysql_query("SELECT * FROM $tbl_hospitals WHERE id = '$id' ")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
  
 
 if($row)
 {
 $name = $row['name'];
 $state = $row['state_id'];
 $city = $row['city_id'];
 $address= $row['address'];
 $email=$row['email'];
 $phone=$row['phone'];
 $oinfo=$row['other_info'];
 
 
 renderForm($id,$name,$state,$city,$address,$email,$phone,$oinfo,'');
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