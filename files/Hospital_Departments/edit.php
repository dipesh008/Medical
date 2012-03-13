<?php
  
                
              function departments_options($selid)
			   {
			    include('dbinfo.php');
                $result = mysql_query("SELECT id,name FROM $tbl_departments")
                or die(mysql_error()); 
				
				$options='<options value="NULL">Choose</option>';
				while($row = mysql_fetch_array( $result )) 
				{
				
				$id=$row["id"];
  	            $dname=$row["name"];
				
				if($selid == $id)
				{
				 $options.='<option value='.$id.' selected >'.$dname.'</option>';
				}
				
				else
				{
				 $options.='<option value='.$id.'>'.$dname.'</option>';
				}
								
				}
				 return $options;
				}
 ?>

<?php
  
                
              function hospitals_options($selid)
			   {
			   include('dbinfo.php');
                $result = mysql_query("SELECT id,name FROM $tbl_hospitals")
                or die(mysql_error()); 
				
				$optionsh='<options value="NULL">Choose</option>';
				while($row = mysql_fetch_array( $result )) 
				{
				
				$id=$row["id"];
  	            $hname=$row["name"];
				
				if($selid == $id)
				{
				 $optionsh.='<option value='.$id.' selected >'.$hname.'</option>';
				}
				
				else
				{
				 $optionsh.='<option value='.$id.'>'.$hname.'</option>';
				}
								
				}
				 return $optionsh;
				}
 ?>
 
<?php

 function renderForm($id,$did,$hid,$error)
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
 <table border="1" cellpadding="0" cellspacing="0">
 
     
	 <tr>
	    <td>Department: *</td>
		    <td>
			   <select name="did">
			  
			   <?php $temp=departments_options($did);
			         echo $temp; ?>
			   
			   </select>     		
			</td>
	 </tr>
	 
	 
	 
	 <tr>
	    <td>Hospital: *</td>
		    <td>
			   <select name="hid">
			   
			   <?php $temp=hospitals_options($hid);
			         echo $temp; ?>
			  
			   </select>     		
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
 if (is_numeric($_POST['id']))
 {
 $id = $_POST['id'];
 $did = mysql_real_escape_string((int) $_POST['did']);
 $hid = mysql_real_escape_string((int) $_POST['hid']);
 
 
 
 if ($did == '' || $hid == '')
 {
 $error = 'ERROR: Please fill in all required fields!';
 
 
 renderForm($id,$did,$hid,$error);
 }
 else
 { 
 echo $query="UPDATE $tbl_hosdepart  SET depart_id='$did',hospital_id='$hid',updated_at=now() WHERE id='$id'";
  mysql_query($query) or die(mysql_error()); 


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
 $result = mysql_query("SELECT * FROM $tbl_hosdepart WHERE id = $id ")
 or die(mysql_error()); 
 $row = mysql_fetch_array($result);
 
 if($row)
 {
 $did = $row['depart_id'];
 $hid = $row['hospital_id'];
  
 renderForm($id,$did,$hid,'');
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