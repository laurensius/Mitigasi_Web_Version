<?php
session_start();
error_reporting(0);
include "../config/koneksi.php";
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
date_default_timezone_set("Asia/Jakarta");
function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
    if (trim ($timestamp) == '')
    {
            $timestamp = time ();
    }
    elseif (!ctype_digit ($timestamp))
    {
        $timestamp = strtotime ($timestamp);
    }
    # remove S (st,nd,rd,th) there are no such things in indonesia :p
    $date_format = preg_replace ("/S/", "", $date_format);
    $pattern = array (
        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
        '/April/','/June/','/July/','/August/','/September/','/October/',
        '/November/','/December/',
    );
    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
        'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
        'Oktober','November','Desember',
    );
    $date = date ($date_format, $timestamp);
    $date = preg_replace ($pattern, $replace, $date);
    $date = "{$date} {$suffix}";
    return $date;
} 
 

$id_user=$_SESSION['uid'];
$nm_user=$_SESSION['namauser'];
$photo=$_SESSION['photo'];
$sesi_username      = isset($_SESSION['username']) ? $_SESSION['username'] : NULL;
if ($sesi_username != NULL || !empty($sesi_username) ||$_SESSION['level']=='admin'  )

{

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIM | MITIGASI</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-red-light sidebar-mini" >
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SIM</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mitigasi </b>Bencana</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

<?php 
     $server = "localhost";
$username = "root";
$password = "laurens23";
$database = "db_mitigasi";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
    $pesan_baru=mysql_query("SELECT * FROM tbl_rpt_bencana WHERE dibuka='1'");
    $jum_pesan=mysql_num_rows($pesan_baru);
    ?>
  
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="?mod=inbox&id=<?php echo $id_user ; ?>" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success"><?php echo $jum_pesan; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Ada <?php echo $jum_pesan; ?> pesan</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php
                   $sql=mysql_query("SELECT * FROM tbl_rpt_bencana WHERE dibuka='1'");
    while($r=mysql_fetch_array($sql)){
      $id=$r['id'];
     echo " <li>
                    <a href='?mod=inbox&id=$id'>
                      <div class='pull-left'>
                      <!--img src='../foto_lapm/". $r['gambar'] ."' class='user-image' alt='User Image'-->
                      </div>
                    
                      <p>" . $r['keterangan'] . "</p>
                    </a>
                  </li>";
                             
    }
    ?>
                  
     
                </ul>
              </li>
              <li class="footer"><a href="?mod=inbox">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
           <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!--  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
              <?php
                  $user=mysqli_query($mysqli,"select * from user where uid='$id_user'");
                  while($rowuser=mysqli_fetch_array($user)) {
                      echo "<!--img src='" . $rowuser['photo'] . "' class='user-image' alt='User Image'-->";
                    
                  }
                  ?>
              <span class="hidden-xs"> <?php
                
                $a=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE nama='$_SESSION[namauser]'"));
               
                echo "$nm_user";
              ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                
               <?php
                  $user=mysqli_query($mysqli,"select * from user where uid='$id_user'");
                  while($rowuser=mysqli_fetch_array($user)) {
                      echo "<!--img src='" . $rowuser['photo'] . "' class='img-circle' alt='User Image'-->";
                    
                  }
                  ?>
                <p>
                <?php
       
              ?>

                  <small>Last Login: <?php
       $ab=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE uid=$id_user"));
                  $w_login=$ab['w_login'];
                   echo indonesian_date($w_login);?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?mod=data_user" class="btn btn-default btn-flat">Data User</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel 
      <div class="user-panel">
        <div class="pull-left image">
          <?php
                  $user=mysqli_query($mysqli,"select * from user where uid='$id_user'");
                  while($rowuser=mysqli_fetch_array($user)) {
                      echo "<img src='" . $rowuser['photo'] . "' class='img-circle' alt='User Image'>";
                    
                  }
                  ?>
        </div>
        <div class="pull-left info">
          <p> <?php
                
                $a=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE nama='$_SESSION[namauser]'"));
                echo "$a[nama]";
                echo "$nm_user";
              ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
        <li class="active treeview">
          <a href="?mod=home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
         
        </li>
     <!--
        <li class="treeview">
          <a href="?mod=panduan_bencana">
            <i class="fa fa-globe"></i>
            <span>Data Panduan Bencana</span>
            
          </a>
          
        </li>
        -->
         <li class="active treeview">
          <a href="?mod=kel_lap_mas">
            <i class="fa fa-book"></i> <span>Laporan Masyarakat</span>
            
          </a>
         
        </li>
         <li class="active treeview">
          <a href="?mod=info_bencana">
            <i class="fa fa-plus"></i> <span>Input Info Bencana</span>
            
          </a>
         
        </li>
          <li class="active treeview">
          <a href="?mod=peringatan_dini">
            <i class="fa fa-flash"></i> <span>Input Peringatan Dini</span>
            
          </a>
         
        </li>
        
          <li class="active treeview">
          <a href="?mod=data_user">
            <i class="fa fa-users"></i> <span>Data User</span>
            
          </a>
         
        </li>
          
         <li class="active treeview">
          <a href="../chat/index.php">
            <i class="fa fa-commenting"></i> <span>Chat Grup</span>
            
          </a>
         
        </li>
          
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <div class="container-fluid">
    <!-- Content Header (Page header)
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
 -->
    <!-- Main content -->
  <?php include "konten.php"; ?>
    <!-- /.content -->
  </div>

    <!-- Main content -->
 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 Didin Lukmanul Hakim.</strong>
  </footer>


</div>
<!-- ./wrapper -->
<script src="../js/jquery-2.1.4.min.js"></script>
<script src="../js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="../js/jquery.livequery.js" ></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>

<script type="text/javascript" src="../js/wall.js"></script>
<script type="text/javascript" src="../js/suggest.js"></script>
<!-- jQuery 2.2.3 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->

<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('keterangan');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
  });
</script>
</body>
</html>
<?php
}else{
    session_destroy();
    header('Location:index.php?status=Silahkan Login');
}
?>