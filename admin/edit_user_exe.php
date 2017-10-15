<?php
	        $server = "localhost";
$username = "root";
$password = "";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
# Baca variabel Form ( If Register global On )
		$id_uidh = $_POST['id_uidh'];
		$id_uid=$_POST['id_uid'];
		
		$sql="UPDATE user SET uid='Y' WHERE uid='$id_uidh'";
	$qry=mysql_query($sql);
	if($qry){
		echo " <div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><i class='fa fa-check'></i> berhasil di ubah...!!!<br/></div>";
		echo "<meta content='0;url=?mod=edit_user' http-equiv='refresh'>";
		}
		else
		{
	
		echo " <div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><i class='fa fa-check'></i> GAGAL di ubah...!!!<br/></div>".mysql_error();
		echo "<meta content='0;url=?mod=edit_user' http-equiv='refresh'>";

			}
	

?>