<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>View Records</title>
</head>
<body>
<p><a href="add.php"><input type=button value="Add"</a></p>
<?php

        include('dbinfo.php');

        
        $result = mysql_query("SELECT * FROM $tbl_hosdepart order by created_at") 
                or die(mysql_error());  
        
        
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>Department</th> <th>Hospital</th> <th></th> <th></th>  </tr>";

        $count=0;       
        while($row = mysql_fetch_array( $result )) {
                $count=$count+1;
               
                echo "<tr>";
                echo '<td>' . $count. '</td>';
             
				
				$departid= $row['depart_id'];
				$resultd = mysql_query("SELECT * FROM $tbl_departments where id='$departid'");
                $depart=mysql_fetch_array($resultd)		   
		        or die(mysql_error());  
		        echo '<td>' . $depart['name']. '</td>';
		       
			    $hospitalid=$row['hospital_id'];
				$resulth=mysql_query("SELECT * FROM $tbl_hospitals where id='$hospitalid'");
                $hosid=mysql_fetch_array($resulth)
				or die(mysql_error());
			    echo '<td>' . $hosid['name'] . '</td>';
				
				
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 

        
        echo "</table>";
?>


</body>
</html> 