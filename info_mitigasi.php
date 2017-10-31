<section class="content">
  <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Peringatan Dini</h3>            
    </div>      
    <!-- /.box-header -->
    <div class="box-body">
      <ul class="media-list">
      <?php
      session_start();
      include "config/koneksi.php";
      include "config/fungsi_indotgl.php";
      include "config/class_paging_berita.php";
      include "config/fungsi_combobox.php";
      include "config/library.php";
      include "config/fungsi_autolink.php";
      include "config/fungsi_badword.php";
      include "config/fungsi_kalender.php";
      include "config/fungsi_seo.php";

      $str = "Select * " 
      ."from "
      ."tbl_peringatan_dini "
      ."order by id_dini desc";
      $query = mysqli_query($mysqli,$str) or die(mysqli_error());
      while($rows = mysqli_fetch_array($query)){
        if($rows["foto"] != null){
          $gmb = $rows["foto"];
        }else{
          $gmb = "default.jpg";
        }
        ?>
          <li class="media">
            <a class="pull-left" href="#">
              <img width="100" class="img img-responsive" src="admin/gambar/<?php echo $gmb; ?>">
            </a>
            <div class="media-body">
              <h4 class="media-heading"><b>Peringatan Dini</b></h4>
              <p>Tanggal dikeluarkan : <?php echo $rows["tgl"]; ?></p>
              <p><?php echo $rows["isi"]; ?></p>
            </div>
          </li>
        <?php
      }
      ?>
      </ul>
    </div>
  </div>
</section>