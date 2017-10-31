<section class="content">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Info Bencana</h3>            
    </div>      
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
      <?php
      session_start();
      // Panggil semua fungsi yang dibutuhkan (semuanya ada di folder config)
      include "config/koneksi.php";
      include "config/fungsi_indotgl.php";
      include "config/class_paging_berita.php";
      include "config/fungsi_combobox.php";
      include "config/library.php";
      include "config/fungsi_autolink.php";
      include "config/fungsi_badword.php";
      include "config/fungsi_kalender.php";
      include "config/fungsi_seo.php";

      $str = "Select " 
            ."tbl_info_bencana.id_info, "
            ."tbl_info_bencana.id_bencana, "
            ."tbl_info_bencana.tempat, "
            ."tbl_info_bencana.lat, "
            ."tbl_info_bencana.lon, "
            ."tbl_info_bencana.korban, "
            ."tbl_info_bencana.kronologis, "
            ."tbl_info_bencana.tgl, "
            ."tbl_info_bencana.foto, "
            ."tbl_info_bencana.id_bencana, "
            ."tbl_bencana.nama_bencana "  
            ."from "
            ."tbl_info_bencana "
            ."inner join "
            ."tbl_bencana "
            ."on "
            ."tbl_info_bencana.id_bencana = tbl_bencana.id_bencana "
            ."order by tbl_info_bencana.id_info desc";
      $query = mysqli_query($mysqli,$str) or die(mysqli_error());
      while($rows = mysqli_fetch_array($query)){
        if($rows["foto"] != null){
          $gmb = $rows["foto"];
        }else{
          $gmb = "default.jpg";
        }
        ?>
        <div class="col-xs-12 col-lg-3">
          <div class="thumbnail">
            
            <img class="img img-responsive" width="100%" src="admin/gambar/<?php echo $gmb; ?>">
            <div class="caption">
              <h3><?php echo $rows["nama_bencana"] ?></h3>
              <p><?php echo "Lokasi :". $rows["tempal"] ."<br>Waktu : ". $rows["tgl"]; ?></p>
              <p><a href="?mod=detailnotif&tipe=informasi_bencana&id=<?php echo $rows["id_info"]; ?>" class="btn btn-primary" role="button">Selengkapnya . . . </a> 
            </div>
          </div>
        </div>
        <?php
      }
    ?>
      </div>
    </div>
  </div>
</section>