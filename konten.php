<?php
session_start();
// error_reporting(0);
include "config/koneksi.php";


// Bagian Home
if ($_GET['mod']=='')
  {
   include "home.php";
  }
  

// Bagian Modul
elseif ($_GET['mod']=='home'){
  
    include "home.php";
  
}
elseif ($_GET['mod']=='gunung'){
  
    include "panduan_gunung.php";
  
}
elseif ($_GET['mod']=='save_lapm'){
  
    include "save_lapm.php";
  
}
elseif ($_GET['mod']=='tsunami'){
  
    include "panduan_tsunami.php";
  
}
elseif ($_GET['mod']=='kirim_pesan'){
  
    include "kirim_pesan.php";
 
}
elseif ($_GET['mod']=='inbox'){
  
    include "inbox.php";
 
}
elseif ($_GET['mod']=='gempa'){
  
    include "panduan_gempa.php";
  
}
elseif ($_GET['mod']=='banjir'){
  
    include "panduan_banjir.php";
  
}
elseif ($_GET['mod']=='detailpanduan'){
  
    include "detailpanduan.php";
  
}
elseif ($_GET['mod']=='peta_kerawanan'){
  
    include "peta_kerawanan.php";
  
}
elseif ($_GET['mod']=='panduan'){
  
    include "panduan.php";
  
}
elseif ($_GET['mod']=='peta_rawan'){
  
    include "peta_rawan.php";
  
}
elseif ($_GET['mod']=='peta_kekeringan'){
  
    include "peta_kekeringan.php";
  
}
elseif ($_GET['mod']=='peta_kebakaran_hutan'){
  
    include "peta_kebakaran_hutan_lahan.php";
  
}
elseif ($_GET['mod']=='peta_longsor'){
  
    include "peta_longsor.php";
  
}
elseif ($_GET['mod']=='peta_rawan_gunung'){
  
    include "peta_rawan_gunung.php";
  
}
elseif ($_GET['mod']=='profile'){
  if ($_SESSION['level']=='user'){
    include "profile.php";
  }
}
// Bagian Logout
elseif ($_GET['mod']=='logout'){
  if ($_SESSION['level']=='admin'){
    include "logout.php";
  }
}
// Bagian Kategori
elseif ($_GET['mod']=='report_bencana'){
  if ($_SESSION['level']=='user'){
    include "report_bencana.php";
  }
}
elseif ($_GET['mod']=='home_user'){
  if ($_SESSION['level']=='user'){
    include "home_user.php";
  }
}
elseif ($_GET['mod']=='chat'){
  if ($_SESSION['level']=='user'){
    include "chat/index.php";
  }
}
// Bagian cari Kategori

elseif ($_GET['mod']=='info-bencana'){
  
    include "info-bencana.php";
  
}
elseif ($_GET['mod']=='info_berita'){

    include "info_berita.php";
  
}

elseif ($_GET['mod']=='info_mitigasi'){
  
    include "info_mitigasi.php";
  
}
elseif ($_GET['mod']=='detaildini'){
  
    include "detaildini.php";
  
}
elseif ($_GET['mod']=='chat'){
  
    include "login.php";
  
}
elseif ($_GET['mod']=='detailberita'){

    include "detailberita.php";
  
}
elseif ($_GET['mod']=='pesan_grup'){
  if ($_SESSION['level']=='user'){
    include "pesan_grup.php";
  }
}
elseif ($_GET['mod']=='detailnotif'){
  
    include "detailnotif.php";
  
}
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}

?>
