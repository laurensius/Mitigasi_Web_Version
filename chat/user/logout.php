<?php
	// session_start();
	// session_destroy();
	if($_SESSION['level'] == "admin"){
		// header('Location: ../../admin/beranda.php?mod=home');
		echo "dfsdf";
	}else{
		header('Location: ../../beranda.php?mod=home_user');
	}
	
?>