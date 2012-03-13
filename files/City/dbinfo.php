<?php
 $server = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'medical';
 $tbl_states='states';
 $tbl_city='city';
 
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());
?>