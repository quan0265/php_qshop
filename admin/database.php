<?php 

$dbHost= "localhost";
$dbUser= "root";
$dbPass= "";
$dbName= "php_qshop";

$conn= mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if(!$conn){
	die("ket noi that bai".mysqli_connect_errors());
}

mysqli_set_charset($conn, 'utf8');













 ?>