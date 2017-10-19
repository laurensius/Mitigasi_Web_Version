<section class="content">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h7 class="box-title">Notifikasi </h7> 
      <!-- <h7 class="box-title"><a href="?mod=info_mitigasi"> <i class="fa fa-angle-left"> Back</i> </a></h7> -->         
    </div>      
    <div class="box-body">
      <?php
       $server = "localhost";
       $user = "root";
       $password = "laurens23";
       $dbname = "db_mitigasi";
        $connection_driver = mysqli_connect($server,$user,$password);
      if($connection_driver){
        mysqli_select_db($connection_driver,$dbname); 
      }else{
        echo "Fatal Error";
        die();
      }
      $tipe = $_GET["tipe"];
      $id = $_GET["id"];
      if($tipe == "informasi_bencana"){
        $query = "Select tbl_info_bencana.tempat,tbl_info_bencana.korban,tbl_info_bencana.kronologis,tbl_info_bencana.tgl,tbl_info_bencana.foto,tbl_bencana.nama_bencana from tbl_info_bencana inner join tbl_bencana on tbl_info_bencana.id_bencana = tbl_bencana.id_bencana where id_info='".$id."'";
        $execute = mysqli_query($connection_driver,$query);
        $result = mysqli_fetch_object($execute);
        echo "<center><h4>Informasi Bencana</h4></center>";
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td><b>Bencana </b></td>";
        echo "<td>".$result->nama_bencana."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>Lokasi </b></td>";
        echo "<td>".$result->tempat."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>Tanggal </b></td>";
        echo "<td>".$result->tgl."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>Korban </b></td>";
        echo "<td>".$result->korban."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><b>Kronologis</b></td>";
        echo "<td>".$result->kronologis."</td>";
        echo "</tr>";
        if($result->foto!=""){
          echo "<td><b>Gambar</b></td>";
          echo "<td><img class='img img-responsive' src='admin/gambar/".$result->foto."'></td>";
          echo "</tr>";     
        }
        echo "</table>"; 
      }
      if($tipe == "peringatan_dini"){
        $query = "Select * from tbl_peringatan_dini where id_dini='".$id."'";
        $execute = mysqli_query($connection_driver,$query);
        $result = mysqli_fetch_object($execute);
        echo "<center><h4>Peringatan Dini</h4></center>";
        echo "<table class='table table-striped'>";
        echo "<tr>";
        echo "<td><b>Peringatan </b></td>";
        echo "<td>".$result->isi."</td>";
        echo "</tr>";
        if($result->gambar!=""){
          echo "<td><b>Gambar</b></td>";
          echo "<td><img class='img img-responsive'  src='admin/gambar/".$result->gambar."'></td>";
          echo "</tr>";   
        }
        echo "</table>"; 
      }
      ?>
    </div>
  </div>
</section>