<?php
 
//MySQLi Procedural
$conn = mysqli_connect("localhost","root","","db_mitigasi");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>