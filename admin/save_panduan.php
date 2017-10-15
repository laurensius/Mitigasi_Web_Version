        <?php
        $server = "localhost";
$username = "root";
$password = "";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
        include "../config/library.php";
    
    $panduan = $_POST['panduan'];
   $judul=$_POST['judul'];
    $file_gambar = $_FILES['file_gambar'];
    $keterangan = $_POST['keterangan'];
   $tgl  = gmdate("Y-m-d");
    $image=$_FILES['file_gambar']['name'];
  //print_r($imageName);
  
  $path = "gambar/";
    $sql="INSERT INTO panduan VALUES('','$panduan','$judul','$keterangan','$hari_ini','$tgl','$jam_sekarang','$image','0')";
    $res=mysql_query($sql);
   
    //copy gambar
    $file_name=$_FILES['file_gambar']['name'];
  $file_name=stripslashes($file_name);
    $file_name=str_replace("'","",$file_name);
    copy($_FILES['file_gambar']['tmp_name'],"gambar/".$file_name);
    
    //header("location:admin_list.php");
    if($res){ // Jika berhasil
        //$id_admin=mysql_insert_id($link); 
    ?>  
<div class="alert alert-success fade in"><button type="button" class="close" data-dismiss="alert"><i class='fa fa-times'></i></button><i class="fa fa-check"></i> Data berhasil di simpan<br/></div>
<meta content='0;url=?mod=panduan_bencana' http-equiv='refresh'>
<?php
} 
else { // Jika gagal
echo "<div class='alert alert-danger'><button type='button' class='close' data-dismiss='alert'><i class='fa fa-times'></i></button><strong><i class='fa fa-times'></i> MAAF! Data gagal disimpan</strong><br/></div>".mysql_error(); 
echo "<meta content='0;url=?mod=panduan_bencana' http-equiv='refresh'>";
} 
?>