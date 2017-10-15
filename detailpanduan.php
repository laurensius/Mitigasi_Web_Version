<section class="content">
<div class="box box-danger">
            <div class="box-header with-border">
              <h7 class="box-title"><a href="?mod=banjir"> <i class="fa fa-angle-left"> Back</i> </a></h7>            
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
           $detail=mysqli_query($mysqli,"SELECT * FROM panduan WHERE id_panduan = '".abs((int)$_GET[id])."'");
  $d   = mysqli_fetch_array($detail);
  $tgl = tgl_indo($d[tanggal]);
  $baca = $d[dibaca]+1;
  echo "<i class='fa fa-clock-o'></i> $d[hari], $tgl - $d[jam] WIB</span><br />";
  echo "<b>$d[judul]</b><br />";
  echo "- Dibaca: <b>$baca</b> kali</span><br />";

          
  // Apabila ada gambar dalam berita, tampilkan   
  if ($d[gambar]!=''){
    echo "<p><img class='img-responsive pad' src='admin/gambar/$d[gambar]' border=0></p>";
  }
  //$isi_berita=nl2br($d[isi_berita]); // membuat paragraf pada isi berita
  echo "$d[isi] <br />";       

  
  mysql_query("UPDATE panduan SET dibaca=$d[dibaca]+1 
          WHERE id_panduan='".$val->validasi($_GET['id'],'sql')."'"); 

    
?>
            </div>
            </div>
            </section>