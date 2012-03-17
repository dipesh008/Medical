
<?php
 function renderForm($did,$hid,$error)
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
 
                $result = mysql_query("SELECT id,name FROM $tbl_departments")
                or die(mysql_error()); 
				
				$options="Choose";
				while($row = mysql_fetch_array( $result )) 
				{
				$id=$row["id"];
  	            $dname=$row["name"];
  	            $options.="<option value=\"$id\">".$dname ."</option>";
				}
 ?>
 
 
 <?php
 include('dbinfo.php');
 
                $result = mysql_query("SELECT id,name FROM $tbl_hospitals")
                or die(mysql_error()); 
				
				$optionsh="Choose";
				while($row = mysql_fetch_array( $result )) 
				{
				$id=$row["id"];
  	            $hname=$row["name"];
  	            $optionsh.="<option value=\"$id\">".$hname ."</option>";
				}
 ?>
 
 <form action="" method="post">
 <div>
 <table border="1" cellpadding="0" cellspacing="0">
  
     
	 <tr>
	    <td>Department: *</td>
		    <td>
			   <select name="did">
			   <option value="$options">
			   <?php echo $options; ?>
			   </option>
	           </select>         		
			
			</td>
	 </tr>
	 
	 <tr>
	    <td>Hospital: *</td>
		    <td>
			   <select name="hid">
			   <option value="$optionsh">
			   <?php echo $optionsh; ?>
			   </option>
	                 		
			
			</td>
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
 $did = mysql_real_escape_string((int) $_POST['did']);
 $hid= mysql_real_escape_string((int) $_POST['hid']);
 
 
 
 if ($did == '' || $hid == '' )
 {
 $error = 'ERROR: Please fill in all required fields!';
 
 
 renderForm($did,$hid,$error);
 }
 else
 {
  mysql_query("INSERT into $tbl_hosdepart (depart_id,hospital_id) values('$did','$hid') ")
 or die(mysql_error()); 
 
 header("Location: view.php"); 
 }
 }
 else
 {
 renderForm('','','');
 }

?> 