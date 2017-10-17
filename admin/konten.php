<?php
session_start();
// error_reporting(0);
include "config/koneksi.php";


// Bagian Home
if ($_GET['mod']==''){
  if ($_SESSION['level']=='admin'){
    include "home.php";
  }
}  

// Bagian Modul
elseif ($_GET['mod']=='home'){
  if ($_SESSION['level']=='admin'){
    include "home.php";
  }
}  

// Bagian Logout
elseif ($_GET['mod']=='logout'){
  if ($_SESSION['level']=='admin'){
    include "logout.php";
  }
}
elseif ($_GET['mod']=='inbox'){
  if ($_SESSION['level']=='admin'){
    include "inbox.php";
  }
}
// Bagian Kategori
elseif ($_GET['mod']=='report_bencana'){
  if ($_SESSION['level']=='admin'){
    include "report_bencana.php";
  }
}
elseif ($_GET['mod']=='read_pesan'){
  if ($_SESSION['level']=='admin'){
    include "read_pesan.php";
  }
}
elseif ($_GET['mod']=='panduan_bencana'){
  if ($_SESSION['level']=='admin'){
    include "panduan_bencana.php";
  }
}
elseif ($_GET['mod']=='input_info_bencana'){
  if ($_SESSION['level']=='admin'){
    include "input_info_bencana.php";
  }
}
elseif ($_GET['mod']=='info_bencana'){
  if ($_SESSION['level']=='admin'){
    include "info_bencana.php";
  }
}
elseif ($_GET['mod']=='peta'){
  if ($_SESSION['level']=='admin'){
    include "peta.php";
  }
}
elseif ($_GET['mod']=='save_info_bencana'){
  if ($_SESSION['level']=='admin'){
    include "save_info_bencana.php";
  }
}
elseif ($_GET['mod']=='chat'){
  if ($_SESSION['level']=='admin'){
    include "../chat/index.php";
  }
}
elseif ($_GET['mod']=='pesan_grup'){
  if ($_SESSION['level']=='admin'){
    include "../pesan_grup.php";
  }
}
elseif ($_GET['mod']=='data_user'){
  if ($_SESSION['level']=='admin'){
    include "data_user.php";
  }
}
elseif ($_GET['mod']=='edit_admin'){
  if ($_SESSION['level']=='admin'){
    include "edit_admin.php";
  }
}
elseif ($_GET['mod']=='edit_admin_exe'){
  if ($_SESSION['level']=='admin'){
    include "edit_admin_exe.php";
  }
}

elseif ($_GET['mod']=='kel_lap_mas'){
  if ($_SESSION['level']=='admin'){
    include "kel_lap_mas.php";
  }
}
elseif ($_GET['mod']=='kirim_pesan'){
  if ($_SESSION['level']=='admin'){
    include "kirim_pesan.php";
  }
}
elseif ($_GET['mod']=='peringatan_dini'){
  if ($_SESSION['level']=='admin'){
    include "input_peringatan_dini.php";
  }
}
elseif ($_GET['mod']=='save_peringatandini'){
  if ($_SESSION['level']=='admin'){
    include "save_peringatandini.php";
  }
}
elseif ($_GET['mod']=='save_panduan'){
  if ($_SESSION['level']=='admin'){
    include "save_panduan.php";
  }
}
// Apabila modul tidak ditemukan
else{
  echo "<p><b>MODUL BELUM ADA ATAU BELUM LENGKAP</b></p>";
}

?>
