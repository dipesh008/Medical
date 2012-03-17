<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<title>View Records</title>
</head>
<body>
<p><a href="add.php"><input type="submit" value=Add></a></p>
<?php
     include('dbinfo.php');
	 
	 $result = mysql_query("SELECT * FROM $tbl_hospitals order by created_at") 
		or die(mysql_error());  	
	 	
		
	echo "<table border='1' cellpadding='3' cellspacing='0'>";
	echo "<tr> <th>Id</th> <th>Name</th> <th>State</th> <th>City</th>  
	</tr>";

	$count=0;
	while($row = mysql_fetch_array( $result )) 
	{
		$count=$count+1;
		
		echo "<tr>";
		echo '<td>' . $count . '</td>';
		echo '<td>' .'<a href=hospital.php?id=' . $row['id'] .'>'. $row['name'] . '</a>'.'</td>';
		
	    
		$state=$row['state_id'];		 
		$res = mysql_query("SELECT * FROM $tbl_states where id='$state'");
		
        $sname=mysql_fetch_array($res);  
		echo '<td>' .$sname['name']. '</td>';
		
		$city=$row['city_id'];		 
		$resc = mysql_query("SELECT * FROM $tbl_city where id='$city'");
		
        $cname=mysql_fetch_array($resc);  
		echo '<td>' .$cname['name']. '</td>';
	    
		
	    //$deptt=mysql_query("select * from $tbl_hosdepart where hospital_id='$row[0]' ");
		//echo '<td>';
		
		//while($dep=mysql_fetch_array($deptt))
		
		 //{
		        //$departid= $dep['depart_id'];
				//$resultd = mysql_query("SELECT * FROM $tbl_departments where id='$departid'");
                //$depart=mysql_fetch_array($resultd)		   
		        //or die(mysql_error());  
				//echo $depart['name']."<br/>";
		 
		 //}
		        
		       
		
		 //echo '</td>';
		//echo '<td>' . $row['address'] . '</td>';
		//echo '<td>' . $row['email'] . '</td>';
		//echo '<td>' . $row['phone'] . '</td>';
		//echo '<td>' . $row['other_info'] . '</td>';
		echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
		echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
		echo "</tr>"; 
	} 

	
	echo "</table>";
?>


</body>
</html>	