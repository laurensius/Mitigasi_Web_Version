<?php
 $server = "localhost";
$username = "root";
$password = "laurens23";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>
<?php
if(isset($_GET['act'])) {
						$id = $_GET['id'];
						$sql = "delete from tbl_info_bencana where id_info='$id' ";
						mysql_query($sql) or die(mysql_error());

					}
					
?>
<section class="content">
  <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Data Info Bencana</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
            
   
    <div class="row">

   <div class="col-md-12 col-sm-12">
<table class="table table-hover table-bordered">
		<thead>
			<th><td><b>Tempat </b></td><td><b>Korban</b></td><td><b>Tanggal</b></td><td><b>Kronologis</b></td><td><b>Aksi</b></td></th>
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
$query="SELECT * from tbl_info_bencana limit $posisi,$batas ";
$result=mysql_query($query) or die(mysql_error());
$no=1;
//proses menampilkan data
while($rows=mysql_fetch_object($result)){

			?>
			<tr>
				<td><?php echo  $posisi+$no?></td>
				<td><?php		echo $rows -> tempat;?></td>
				<td><?php		echo $rows -> korban;?></td>
			   <td><?php		echo $rows -> tgl;?></td>
				<td><?php echo $rows -> kronologis;?></td>
				<td>
				<!--	
					<a href="beranda.php?mod=peta&id=<?php echo 	$rows -> id_info;?>"

				class='btn btn-primary'> <i class="fa fa-map-marker"></i></a>-->

				<a href="beranda.php?mod=info_bencana&act=del&id=<?php echo 	$rows -> id_info;?>"
				onclick="return confirm('Yakin data akan dihapus?') ";
				class='btn btn-danger'> <i class="fa fa-trash"></i></a></td>
			</tr>
			<?php $no++;
	}?>

			<tr>
				<td colspan='5' ></td><td><a href="beranda.php?mod=input_info_bencana"
				class='btn btn-warning'	><i class="fa fa-plus"></i></a></td>
			</tr>
		</tbody>
	</table>
	<?php
//=============CUT HERE for paging====================================
$tampil2 = mysql_query("SELECT id_info from tbl_info_bencana");

$jmldata = mysql_num_rows($tampil2);
$jumlah_halaman = ceil($jmldata / $batas);

echo "<div class='pagination'> <ul>";
for($i = 1; $i <= $jumlah_halaman; $i++)

	echo "<li><a href='beranda.php?mod=info_bencana&pg=halaman=$i'>$i</a></li>";

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
           <small><i> Isilah data panduan bencana di atas</i></small>
            </div>
          </div>
 </section>