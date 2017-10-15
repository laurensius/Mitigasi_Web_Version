<?php
	include('conn.php');
	session_start();
	function check_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$username=check_input($_POST['username']);
		
		if (!preg_match("/^[a-zA-Z0-9_]*$/",$username)) {
			$_SESSION['msg'] = "Username should not contain space and special characters!"; 
			header('location: index.php');
		}
		else{
			
		$fusername=$username;
		
		$password = check_input($_POST["password"]);
		$fpassword=md5($password);
		
		$query=mysqli_query($conn,"select * from `user` where nama='$fusername' and pass='$fpassword'");
		
		if(mysqli_num_rows($query)==0){
			$_SESSION['msg'] = "Login Failed, Invalid Input!";
			header('location: index.php');
		}
		else{
			
			$row=mysqli_fetch_array($query);
			
				if ($row['level']=='admin'){
				$_SESSION['id']=$row['uid'];
				?>
				<script>
					window.alert('Level Anda sebagai Admin!');
					window.location.href='http://localhost/mitigasi/chat/user/index.php';
				</script>
				<?php
			}
			else{
				$_SESSION['id']=$row['uid'];
				?>
				<script>
					window.alert('Level Anda sebagai User');
					window.location.href='http://localhost/mitigasi/chat/user/index.php';
				</script>
			
				<?php
			}
					?>
				<?php
			
		}
		
		}
	}
?>