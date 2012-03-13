<?php
 function renderForm($name,$state,$city,$address,$email,$phone,$phone1,$fax,$oinfo,$error)
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
  	            $state=$row["name"];
  	            $options.="<option value=\"$id\">".$state ."</option>";
				}
 ?>
 
 
 <?php
 include('dbinfo.php');
 
                $result = mysql_query("SELECT id,name FROM $tbl_city")
                or die(mysql_error()); 
				
				$optionsc="Choose";
				while($row = mysql_fetch_array( $result))
				{
				$id=$row["id"];
  	            $city=$row["name"];
  	            $optionsc.="<option value=\"$id\">".$city ."</option>";
				}
 ?>
 
 <form action="" method="post">
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
			   <option value="$options">
			   <?php echo $options; ?>
			   </option>
			   </select>     		
			</td>
	 </tr>
	 
	 
	 
	 <tr>
	    <td>City: *</td>
		    <td>
			   <select name="city">
			   <option value="$optionsc">
			   <?php echo $optionsc; ?>
			   </option>
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
	   <td>Phone Number: *</td>
	   <td><input type="text" name="phone1" value="<?php echo $phone1; ?>" /></td>
    </tr>
	
	<tr>
	   <td>Fax Number: *</td>
	   <td><input type="text" name="fax" value="<?php echo $fax; ?>" /></td>
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
 $name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
 $state = mysql_real_escape_string((int) $_POST['state']);
 $city = mysql_real_escape_string((int) $_POST['city']);
 $address = mysql_real_escape_string(htmlspecialchars($_POST['address']));
 $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
 $phone=mysql_real_escape_string($_POST['phone']);
 $phone1=mysql_real_escape_string($_POST['phone1']);
 $fax=mysql_real_escape_string($_POST['fax']);
 $oinfo = mysql_real_escape_string(htmlspecialchars($_POST['oinfo']));
 
 
 if ($name == '' || $state == '' ||  $city == '' ||  $address == '' || $email == '' ||  $phone == '' || $phone1 == '' || $fax == '' || $oinfo == '')
 {
 $error = 'ERROR: Please fill in all required fields!';
 
 
 renderForm($name,$state,$city,$address,$email,$phone,$oinfo,$error);
 }
 else
 {
 
 mysql_query("INSERT into  $tbl_hospitals (name,state_id,city_id,address,email,phone,phone1,fax,other_info) values('$name','$state','$city','$address','$email','$phone','$phone1','$fax','$oinfo') ")
 or die(mysql_error()); 
 
 
 header("Location: view.php"); 
 }
 }
 else
 
 {
 renderForm('','','','','','','','','','');
 }
?> 