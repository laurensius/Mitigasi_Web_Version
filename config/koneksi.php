<?php
// panggil fungsi validasi xss dan injection

// definisikan koneksi ke database
$server = "localhost";
$usermysql = "root";
$password = "laurens23";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
$mysqli= new mysqli ($server,$usermysql,$password,$database);
if ($mysqli->connect_error){
	echo "Gagal terkoneksi ke database : (".$mysqli->connect_eror.")";
}

//SourceCode by AndezNET.com
?>





