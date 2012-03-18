<?php
if($_SERVER['SERVER_NAME']=='localhost'){
    $host="localhost";
    $db_username="root";
    $db_password="";
    $db="medical_prod";
}
else{
    $host="localhost";
    $db_username="dipesh_medical";
    $db_password="medical";
    $db="dipesh_medical_prod";
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