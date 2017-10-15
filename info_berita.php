<section class="content">
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Berita Seputar Bencana</h3>            
            </div>      
            <!-- /.box-header -->
            <div class="box-body">
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

            $p      = new Paging2;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysqli_query($mysqli,"select * FROM tbl_rpt_bencana, user WHERE tbl_rpt_bencana.uid=user.uid
                       group by id DESC LIMIT $posisi,$batas");
  while($r=mysqli_fetch_array($sql)){
   
    $uid=$r['uid'];
$isi_berita = htmlentities(strip_tags($r['keterangan'])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,220); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
        echo "Pengirim : $r[nama]<br />";
       echo "<a href=?mod=detailberita&id=$r[id]>$r[keterangan]</a><br />";
       echo "$isi ... <a href=?mod=detailberita&id=$r[id]>Selengkapnya</a>
        
            <hr color=#CCC noshade=noshade />";
  }

  $jmldata     = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM tbl_rpt_bencana"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halberita], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";

    ?>
   
            </div>
            </div>
            </section>