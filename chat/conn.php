<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","laurens23","db_mitigasi");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>