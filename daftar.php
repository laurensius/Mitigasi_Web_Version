<?php
error_reporting(0);
include "config/koneksi.php";

	$username	= $_POST['username'];
	$password	= $_POST['password2'];
	$email	    = $_POST['email'];
	$enkrip_pass= md5($password);
	$nohp	    = $_POST['nohp'];
      $tgl  = gmdate("Y-m-d H:i:s", time()+60*60*7);

$cek_username=mysqli_num_rows(mysqli_query
             ($mysqli,"SELECT nama FROM user
               WHERE nama='$username'"));

$cek_email=mysqli_num_rows(mysqli_query
             ($mysqli,"SELECT email FROM user
               WHERE email='$email'"));


if ($cek_username > 0) {
    echo "<div id='gagal' class='alert alert-danger'>Maaf Username sudah terdaftar<button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button></div>";
}
else if ($cek_email > 0){
    echo "<div id='gagal' class='alert alert-danger'>Mohon maaf Email anda sudah terdaftar<button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button></div>";

}else {
    $input = mysqli_query($mysqli, "INSERT INTO user(uid,nama,
                                 pass,
                                 email,
                                 level,photo,nohp,aktif)
								VALUES('','$username',
								'$enkrip_pass',
								'$email',
								'user','dist/img/avatar04.png','$nohp','N')");




    if ($input > 0) {
        echo "<div class='alert alert-success'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong><i class='fa fa-check'></i> BERHASIL </strong>Silahkan <a href='index.php'>Login</a><br/></div>";
    } else {
        echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong><i class='fa fa-times'></i> MAAF! </strong>" . mysqli_error($mysqli) . "<br/></div>";
    }
}