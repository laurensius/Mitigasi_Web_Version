<?php
session_start();
error_reporting(0);
     $server = "localhost";
$username = "root";
$password = "";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
<section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Detail laporan masyarakat</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            

<?php
$id=$_GET['id'];
$query = mysql_query("SELECT * from tbl_rpt_bencana, user WHERE tbl_rpt_bencana.uid=user.uid AND tbl_rpt_bencana.id='$id'");
$row=mysql_fetch_array($query);
$images=$row['gambar'];
?>
<img src="../foto_lapm/<?php echo $images; ?>"  /> &nbsp; &nbsp; 
From : <?php echo $row['nama']; ?> </a> <br /> <?php echo $row['keterangan']; ?> 

<?php 
 if(! $_GET['id']==""){
// Update pesan kalo pesan sudah dibuka 
$qry_dibuka=mysql_query("UPDATE tbl_rpt_bencana SET dibuka='0' WHERE id='$id'");
}
?>


</div>
</div>
</section>