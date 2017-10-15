<section class="content">
<div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Panduan Bencana Banjir</h3>            
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
  include "config/fungsi_validasi.php";
  include "config/fungsi_kalender.php";
   include "config/fungsi_seo.php";

            $p      = new Paging2;
  $batas  = 5;
  $posisi = $p->cariPosisi($batas);
  // Tampilkan semua berita
  $sql=mysqli_query($mysqli,"select * FROM panduan WHERE nama_panduan='banjir'
                       group by id_panduan DESC LIMIT $posisi,$batas");
  while($r=mysqli_fetch_array($sql)){
    $tgl = tgl_indo($r[tanggal]);
    $judul=$r[judul];
$isi_berita = htmlentities(strip_tags($r[isi])); // membuat paragraf pada isi berita dan mengabaikan tag html
      $isi = substr($isi_berita,0,220); // ambil sebanyak 150 karakter
      $isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
        echo "$r[hari], $tgl - $r[jam] WIB<br />";
    echo "<a href=?mod=detailberita&id=$r[id_berita]>$r[judul]</a><br />";
       echo "$isi ... <a href=?mod=detailpanduan&id=$r[id_panduan]>Selengkapnya</a>
        
            <hr color=#CCC noshade=noshade />";
  }

  $jmldata     = mysqli_num_rows(mysqli_query($mysqli, "SELECT * FROM panduan"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halberita], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";

    ?>
   
            </div>
            </div>
            </section>