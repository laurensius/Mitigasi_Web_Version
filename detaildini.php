<section class="content">
<div class="box box-danger">
            <div class="box-header with-border">
              <h7 class="box-title"><a href="?mod=info_mitigasi"> <i class="fa fa-angle-left"> Back</i> </a></h7>            
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
           $detail=mysqli_query($mysqli,"SELECT * FROM tbl_peringatan_dini WHERE id_dini = '".abs((int)$_GET[id])."'");
  $d   = mysqli_fetch_array($detail);
   //echo "<i class='fa fa-clock-o'></i> $d[hari], $tgl - $d[jam] WIB</span><br />";
 // echo "<b>$d[keterangan]</b><br />";
  //echo "<span class=posting>Diposting oleh : <b>$d2[nama]</b><br />     ";

          
  // Apabila ada gambar dalam berita, tampilkan   
  if ($d[gambar]!=''){
    echo "<p><img class='img-responsive pad' src='foto_lapm/$d[gambar]' border=0></p>";
  }
  //$isi_berita=nl2br($d[isi_berita]); // membuat paragraf pada isi berita
  echo "$d[isi] <br />";       

  //dapatkan nama domain
  
  // Apabila detail berita dilihat, maka tambahkan berapa kali dibacanya
  mysql_query("UPDATE tbl_berita SET dibaca=$d[dibaca]+1 
          WHERE tbl_id_berita='".$val->validasi($_GET['id'],'sql')."'"); 

  // Paging komentar
  $p      = new Paging7;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  // Komentar berita
  $sql = mysql_query("SELECT * FROM tbl_komentar WHERE tbl_id_berita='".$val->validasi($_GET['id'],'sql')."' AND aktif='Y' LIMIT $posisi,$batas");
  $jml = mysql_num_rows($sql);
  // Apabila sudah ada komentar, tampilkan 
  if ($jml > 0){
    while ($s = mysql_fetch_array($sql)){
      $tanggal = tgl_indo($s[tgl]);
      // Apabila ada link website diisi, tampilkan dalam bentuk link   
      if ($s[url]!=''){
        echo "<span class=komentar><a name=$s[id_komentar] id=$s[id_komentar]><a href='http://$s[url]' target='_blank'>$s[nama_komentar]</a></a></span><br />";  
      }
      else{
        echo "<span class=komentar>$s[nama_komentar]</span><br />";  
      }

      echo "<span class=tanggal>$tanggal - $s[jam_komentar] WIB</span><br /><br />";
      $isian=nl2br($s[isi_komentar]); // membuat paragraf pada isi komentar
      $isikan=sensor($isian); 
 
      echo autolink($isikan);
      echo "<hr color=#CCC noshade=noshade />";       
    }

    $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM tbl_peringatan_dini WHERE id_dini='".$val->validasi($_GET['id'],'sql')."'"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halkomentar'], $jmlhalaman);

    echo "$linkHalaman";
  }

    
?>
            </div>
            </div>
            </section>