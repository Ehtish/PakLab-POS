<?php 

$server = "localhost";
$username ="root";
$password = "2345";
$db = "paklab";

$conn = mysqli_connect($server,$username,$password,$db);

if(mysqli_connect_errno()){
		// Connection Failed
		echo 'Failed to connect to MySQL '. mysqli_connect_errno();
	}
 ?>
