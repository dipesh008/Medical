<?php
if($_SERVER['SERVER_NAME']=='localhost'){
	$host="localhost";
    $db_username="root";
    $db_password="";
    $db="medical_dev";
}
else{
	$host="localhost";
    $db_username="username";
    $db_password="password";
    $db="dbname";
}
// conecting to database
mysql_connect("$host","$db_username","$db_password") or die('cannot connect to host');
mysql_select_db("$db") or die('cannot connect to database');

//tables
$tbl_states='states';
$tbl_city='city';
$tbl_departments='departments';
$tbl_hospitals='hospitals';
$tbl_hosdepart='hospital_departments';

?>