<?php 
$id=$_GET['id'];
include ('dbinfo.php');
$result=mysql_query("select * from $tbl_hospitals where id='$id' ")
or die(mysql_error());
while($row=mysql_fetch_array($result))
{
echo  "<table border=2 cellspacing=1 cellpadding=2>";
echo '<tr>'  .'<td>Name</td>' .'<td>'. $row['name'] .'</td>' .'</tr>';
        $state=$row['state_id'];		 
		$res = mysql_query("SELECT * FROM $tbl_states where id='$state'");
		
        $sname=mysql_fetch_array($res);  
echo '<tr>' .'<td>State</td>' .'<td>'. $sname['name'] .'</td>' .'</tr>';
		
		$city=$row['city_id'];		 
		$resc = mysql_query("SELECT * FROM $tbl_city where id='$city'");
		
        $cname=mysql_fetch_array($resc);  
echo '<tr>'  .'<td>City</td>' .'<td>'. $cname['name'] .'</td>' .'</tr>';


echo '<tr>'.'<td>Departments</td>';

       $deptt=mysql_query("select * from $tbl_hosdepart where hospital_id='$row[0]' ");
		echo '<td>';
		
		while($dep=mysql_fetch_array($deptt))
		
		 {
		        $departid= $dep['depart_id'];
				$resultd = mysql_query("SELECT * FROM $tbl_departments where id='$departid'");
                $depart=mysql_fetch_array($resultd)		   
		        or die(mysql_error());  
				echo $depart['name'];
		 }
		        
		 echo '</td>';

   echo '</tr>';


echo '<tr>'  .'<td>Address</td>' .'<td>'. $row['address'] .'</td>' .'</tr>';

echo '<tr>'  .'<td>Email</td>' .'<td>'. $row['email'] .'</td>' .'</tr>';

echo '<tr>' .'<td>Phone</td>' .'<td>'.$row['phone'] .'</td>' .'</tr>';

echo '<tr>'  .'<td>Other Info</td>' .'<td>'. $row['other_info'] .'</td>' .'</tr>';

echo "</table>";
}
?>
        