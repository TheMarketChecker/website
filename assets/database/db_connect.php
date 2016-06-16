<?php 
// Database Connection

$db_host = "localhost"; 
$db_user = "root";
$db_pass = "";
$db_name = "fazal";


$db_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()){
	die("Database connection failed: (" . mysqli_connect_errno() . ")");
}
?>