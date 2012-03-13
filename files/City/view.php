<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html> 
<head>
        <title>View Records</title>
</head>
<body>
<p><a href=add.php?><input type=button value=Add></a></p>
<?php
        include('dbinfo.php');
        $result = mysql_query("SELECT * FROM $tbl_city order by created_at") 
                or die(mysql_error());  
                
        
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>State</th> <th>City</th> <th></th> <th></th> </tr>";

        $count=0;
        while($row = mysql_fetch_array( $result )) 
		{
		 $count=$count+1;
                echo "<tr>";
                echo '<td>' . $count . '</td>';
				
				$stateid=$row['state_id'];
				$resultstate=mysql_query("Select * from $tbl_states where id='$stateid'");
				$state=mysql_fetch_array($resultstate)
				or die(mysql_error());				
                echo '<td>' . $state['name'] . '</td>';
				
				echo '<td>' . $row['name'] . '</td>';
				
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 
        
		
        echo "</table>";
?>
</body>
</html> 