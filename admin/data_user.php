<?php
 $server = "localhost";
$username = "root";
$password = "";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
<?php
if(isset($_GET['act'])) {
            $id = $_GET['id'];
            $sql = "delete from user where uid='$id' ";
            mysql_query($sql) or die(mysql_error());

          }
          if(! $_GET['kode']=="" && $_GET['kode']=="Y"){

//$no_pesanan=$_REQUEST['no_pesanan'];

//$query = $_GET['no_pesanan'];

$sql1 = mysql_query("UPDATE user SET aktif='N' WHERE uid='".$_GET['kode']."'");


}
          else {

            $sql2 = mysql_query("UPDATE user SET aktif='Y' WHERE uid='".$_GET['kode']."'");
          }
?>
<section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data User</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   
    <div class="row">

   <div class="col-md-12 col-sm-12">
<table class="table table-hover table-bordered">
    <thead>
      <th><td><b>Nama </b></td><td><b>Email</b></td><td><b>NO HP</b></td><td><b>Aktif</b></td><td><b>Aksi</b></td></th>
    </thead>
    <tbody>
<?php
$batas='10';
$halaman=$_GET['halaman'];
$posisi=null;
if(empty($halaman)){
$posisi=0;
$halaman=1;
}else{
$posisi=($halaman-1)* $batas;
}
$query="SELECT * from user limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){
         $a= $rows -> aktif;
      ?>
      <tr>
        <td><?php echo  $posisi+$no?></td>
        <td><?php   echo $rows -> nama;?></td>
        <td><?php   echo $rows -> email;?></td>
         <td><?php   echo $rows -> nohp;?></td>
        <td><?php   echo $rows -> aktif;?></td>
           <td> 
           <?php
        
  echo "<a href=beranda.php?mod=data_user&kode=".$rows -> uid."&aktif=".$rows -> aktif."

        class='btn btn-primary'> <i class='fa fa-lock'>

        </i></a>";
           
        
           ?> 
         ||

        <a href="beranda.php?mod=data_user&act=del&id=<?php echo   $rows -> uid;?>"
        onclick="return confirm('Yakin data <?php echo $rows -> nama; ?> akan dihapus?') ";
        class='btn btn-danger'> <i class="fa fa-trash"></i></a></td>
      </tr>
      <?php $no++;
  }?>

      <tr>
        </tr>
    </tbody>
  </table>
  <?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT uid from user");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);

echo "<div class='pagination'> <ul>";
for($i = 1; $i <= $jumlah_halaman; $i++)

  //echo "<li><a href='beranda.php?mod=data_user&halaman=$i'>$i</a></li>";

?>
  </ul>
</div>
<br>
Jumlah data :<?php echo $jmldata;?>

<?php
// KODE UNTUK MENAMPILKAN PESAN STATUS
if(isset($_GET['status'])) {
  if($_GET['status'] == 0) {
    echo " Operasi data berhasil";
  } else {
    echo "operasi gagal";
  }
}

//close database?>

</div>
 </div>
         </div>
  
  
               </div>
                </p>
           
                 
            <!-- /.box-body -->
            <div class="box-footer clearfix">
           <small><i>Data user</i></small>
            </div>
          </div>
 </section>