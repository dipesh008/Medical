<?php
function load_css(){
	echo'
	<link href="css/960.css" rel="stylesheet" type="text/css">
	<link href="css/common.css" rel="stylesheet" type="text/css">
	';
}
function load_scripts(){
	echo'
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	';
	
}
function load_header(){
	?>
	<header class="grid_16">
			<div class="headerbar">
				<div class="banner"></div>
				<div class="mainmenu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="managestates.php">States</a></li>
						<li><a href="managecity.php">City</a></li>
						<li><a href="managedepartments.php">Departments</a></li>
						<li><a href="managehospitals.php">Hospitals</a></li>
						<li><a href="signout.php">Sign out</a></li>
					</ul>
				</div>
			</div>
		</header>
		<?
}
function load_footer(){
	?>
	<footer class="grid_16">
			<div class="footerbar">
				
			</div>
		</footer>
	<?php
}
function get_totalstates(){
	include("config/dbinfo.php");	
	$result=mysql_query("select * from $tbl_states");
	$total_states=mysql_num_rows($result);
	return $total_states;
}
function get_totalcity(){
	include("config/dbinfo.php");	
	$result=mysql_query("select * from $tbl_city");
	$total_city=mysql_num_rows($result);
	return $total_city;
	
}
function get_totaldepartments(){
	include("config/dbinfo.php");	
	$result=mysql_query("select * from $tbl_department");
	$total_department=mysql_num_rows($result);
	return $total_department;
	
}
function get_totalhospitals(){
	include("config/dbinfo.php");	
	$result=mysql_query("select * from $tbl_hospitals");
	$total_hospitals=mysql_num_rows($result);
	return $total_hospitals;
	
}
function show_states(){
	 include("config/dbinfo.php");
       $result = mysql_query("SELECT * FROM $tbl_states order by created_at") 
                or die(mysql_error());  
		echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>State</th> <th></th> <th></th> </tr>";

        $count=0;
        while($row = mysql_fetch_array( $result )) 
		{
		 $count=$count+1;
                echo "<tr>";
                echo '<td>' . $count . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 
		
        echo "</table>";
	
}
function show_city(){
	include("config/dbinfo.php");
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
}
function show_departments(){
	 include("config/dbinfo.php");
        $result = mysql_query("SELECT * FROM $tbl_departments order by created_at") 
                or die(mysql_error());  
                
        
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr> <th>ID</th> <th>Department</th> <th></th> <th></th> </tr>";

        $count=0;
        while($row = mysql_fetch_array( $result )) 
		{
		 $count=$count+1;
                echo "<tr>";
                echo '<td>' . $count . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td><a href="edit.php?id=' . $row['id'] . '"><input type=button value=Edit></a></td>';
                echo '<td><a href="delete.php?id=' . $row['id'] . '"><input type=button value=Delete></a></td>';
                echo "</tr>"; 
        } 
		
        echo "</table>";
}
?>