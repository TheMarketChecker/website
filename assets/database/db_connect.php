<?php 
// Database Connection

// $db_connect = mysql_connect("mysql5.000webhost.com","a5113842_hisname","ourdomain123");
// mysql_select_db("a5113842_fazal");

$db_host = "31.170.160.89";
$db_user = "a5113842_admin";
$db_pass = "ourdomain123";
$db_name = "a5113842_website";

	
$db_connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	die("Database connection failed: (" . mysqli_connect_errno() . ")");
}

?>