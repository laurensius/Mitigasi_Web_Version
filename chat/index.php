<!DOCTYPE html>
<html>
<head>
	<title>Chat Dengan Grup</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <!-- Theme style -->
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.js"></script>

		<script src="../bootstrap/js/bootstrap.min.js"></script>
<style>
	#login_form{
		width:350px;
		height:350px;
		position:relative;
		top:50px;
		margin: auto;
		padding: auto;
	}
</style>
</head>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h5><center><span class="glyphicon glyphicon-lock"></span> Silahkan Login Kembali</center></h5>
		<hr>
		<form method="POST" action="login.php">
		Username: <input type="text" name="username" class="form-control" required>
		<div style="height: 10px;"></div>		
		Password: <input type="password" name="password" class="form-control" required> 
		<div style="height: 10px;"></div>
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button> 
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">
			<center>
			<?php
				session_start();
				// if(isset($_SESSION['msg'])){
				// 	echo $_SESSION['msg'];
				// 	unset($_SESSION['msg']);
				// }
				if(isset($_SESSION['id'])){
					header('Location: http://localhost/mitigasi/chat/user/index.php');
				}
			?>
			</center>
		</div>
	</div>
</div>
</body>
</html>