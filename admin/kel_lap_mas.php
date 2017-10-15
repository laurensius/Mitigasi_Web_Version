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
            $sql = "delete from tbl_rpt_bencana where id='$id' ";
            mysql_query($sql) or die(mysql_error());

          }
          if(! $_GET['kode']==""){


$sql = mysql_query("UPDATE tbl_rpt_bencana SET status='Benar' WHERE id='".$_GET['kode']."'");
if($sql){
    header("Location:?mod=kel_lap_mas");
}else{
  //echo $sql;
    echo "Gagal Merubah Status";
}
}
          
?>
<section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data laporan masyarakat</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   
    <div class="row">

   <div class="col-md-12 col-sm-12">
<table class="table table-hover table-bordered">
    <thead>
      <th><td><b>Keterangan</b></td><td><b>Status</b></td><td><b>Aksi</b></td></th>
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
$query="SELECT * from tbl_rpt_bencana limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){
         $a= $rows -> aktif;
      ?>
      <tr>
        <td><?php echo  $posisi+$no?></td>
        <td><?php   echo $rows -> keterangan;?></td>
        <td><?php   echo $rows -> status;?></td>
     
           <td> 
           <?php
     
  echo "<a href=beranda.php?mod=kel_lap_mas&kode=".$rows -> id."

        class='btn btn-primary'> <i class='fa fa-lock'>

        </i></a> || ";
           
  echo "<a href=beranda.php?mod=read_pesan&id=".$rows -> id."

        class='btn btn-primary' title='Lihat Pesan Laporan Masyarakat'> <i class='fa fa-eye'>

        </i></a>";
           
           ?> 
         ||

        <a href="beranda.php?mod=kel_lap_mas&act=del&id=<?php echo   $rows -> id;?>"
        onclick="return confirm('Yakin data dengan ID<?php echo  $rows -> id; ?>akan dihapus?') ";
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
$tampil2 = mysql_query("SELECT id from tbl_rpt_bencana");

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
           <small><i>Data Laporan Masyarakat</i></small>
            </div>
          </div>
 </section>