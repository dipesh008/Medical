<?php
$ENV='';
if($_SERVER['SERVER_NAME']=='localhost'){
    $ENV='DEVELOPMENT';
}
else {
	$ENV='PRODUCTION';
}
?>