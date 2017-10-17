
<?php
error_reporting(0);
include "config/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$user = $_POST['username'];
$pass = md5($_POST['passlogin']);

// pastikan username dan password adalah berupa huruf atau angka.

$cek_lagi=mysqli_query($mysqli,"SELECT * FROM user WHERE nama='$user' AND pass='$pass' AND aktif='Y'");
$ketemu=mysqli_num_rows($cek_lagi);
$r=mysqli_fetch_array($cek_lagi);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  $_SESSION['id']      = $r['uid'];
  $_SESSION['uid']     	= $r['uid'];
  $_SESSION['namauser']     = $r['nama'];
  $_SESSION['passuser']     = $r['pass'];
  $_SESSION['level']    = $r['level'];
  $_SESSION['w_login']    	= $r['w_login'];
  $_SESSION['photo']    	= $r['photo'];
   $uid=$_SESSION['uid'];

  if($_SESSION['level']=='user'){
	echo "<div id='sukses' class='alert alert-warning alert-success'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>BERHASIL!</strong></div>  
	      <script>window.location ='beranda.php?mod=home_user'</script>";
	mysqli_query($mysqli,"update user set w_login=now() where uid= $uid");
  } 
}
else{
  echo "<div id='sukses' class='alert alert-warning alert-danger'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>GAGAL LOGIN!</strong></div>";
}


?>