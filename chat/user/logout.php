<?php
	session_start();
	if($_SESSION['level'] == "admin"){
		header('Location: ../../admin/beranda.php?mod=home');
	}else{
		header('Location: ../../beranda.php?mod=home_user');
	}
?>

