<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'wootube';
$con = mysqli_connect($host,$user,$pass,$db) ;
if(!$con) {
	die("Failed to connect with MySQL: ". mysqli_connect_error());
}

?>
