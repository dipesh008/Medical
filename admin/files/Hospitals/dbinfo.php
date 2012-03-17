<?php
 $server = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'medical';
 $tbl_hospitals='hospitals';
 $tbl_states='states';
 $tbl_city='city';
 $tbl_hosdepart='hospital_departments';
 $tbl_departments='departments';
 
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());
?>