<?php
session_start();
error_reporting(0);
include "config/koneksi.php";
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
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
           <?php
					if(empty($_SESSION['namauser']) || $_SESSION['level']=="admin"){ 
            echo '     
            <li>
              <a href="login.php"><i class="fa fa-sign-in"> Login</i></a>
            </li>
            <li>
              <a href="register.php"><i class="fa fa-sign-out"> Daftar</i></a>
            </li>';
          }
           ?>


          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!--  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->

              <?php

                if($_SESSION['level']=="user"){
                  $user=mysqli_query($mysqli,"select * from user where uid='$id_user'");
                  while($rowuser=mysqli_fetch_array($user)) {
                      echo "<img src='" . $rowuser['photo'] . "' class='user-image' alt='User Image'>";
                    
                  }
                }
                  ?>
              <span class="hidden-xs"> 
                <?php
                if($_SESSION['level']=="user"){
                  $a=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE nama='$_SESSION[namauser]'"));
                  echo "$a[nama]";
                  echo "$nm_user";
                }
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                
               <?php
                  $user=mysqli_query($mysqli,"select * from user where uid='$id_user'");
                  while($rowuser=mysqli_fetch_array($user)) {
                      echo "<img src='" . $rowuser['photo'] . "' class='img-circle' alt='User Image'>";
                    
                  }
                  ?>
                <p>
                <?php
                
               
                echo "$a[nama]";
                echo "$nm_user";
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
                  <a href="?mod=profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php

                if($_SESSION['level']=="user"){
                  $user=mysqli_query($mysqli,"select * from user where uid='$id_user'");
                  while($rowuser=mysqli_fetch_array($user)) {
                      echo "<img src='" . $rowuser['photo'] . "' class='img-circle' alt='User Image'>";
                    
                  }
                }
          ?>
        </div>
        <div class="pull-left info">
          <p> <?php
                
                if($_SESSION['level']=="user"){
                $a=mysql_fetch_array(mysql_query("SELECT * FROM user WHERE nama='$_SESSION[namauser]'"));
                echo "$a[nama]";
                echo "$nm_user";
              }
              ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
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
     
        <!-- <li class="treeview">
          <a href="?mod=panduan">
            <i class="fa fa-rss"></i>
            <span>Panduan Bencana</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?mod=banjir"><i class="fa fa-check"></i> Bencana Banjir</a></li>
            <li><a href="?mod=gunung"><i class="fa fa-check"></i> Gunung Meletus</a></li>
            <li><a href="?mod=gempa"><i class="fa fa-check"></i> Gempa Bumi</a></li>
            <li><a href="?mod=tsunami"><i class="fa fa-check"></i> Tsunami</a></li>
          </ul>
        </li> -->
          
        
          <li class="active treeview">
           <a href="?mod=peta_kerawanan">
            <i class="fa fa-map-o"></i>
            <span>Peta Rawan Bencana</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         <ul class="treeview-menu">
            <li><a href="?mod=peta_rawan"><i class="fa fa-check"></i> Rawan Banjir</a></li>
            <li><a href="?mod=peta_rawan_gunung"><i class="fa fa-check"></i> Rawan Gunung Meletus</a></li>
            <li><a href="?mod=peta_kekeringan"><i class="fa fa-check"></i> Rawan Gempa Bumi</a></li>
            <li><a href="?mod=peta_longsor"><i class="fa fa-check"></i> Rawan Longsor</a></li>
            <li><a href="?mod=peta_kebakaran_hutan"><i class="fa fa-check"></i> Kebakaran Hutan dan Lahan</a></li>
          </ul>
        </li>
          <?php
						if(!empty($_SESSION['namauser'])  && $_SESSION['level']=="user")
						{
					?>
         
          <li class="active treeview">
          <a href="?mod=chat">
            <i class="fa fa-commenting"></i> <span>Pesan Grup</span>
            
          </a>
         
        </li>

<li class="active treeview">
          <a href="?mod=info-bencana">
            <i class="fa fa-info"></i> <span>Laporan Masyarakat</span>
            
          </a>
         
        </li>        <?php } ?>
          <li class="active treeview">
          <a href="?mod=info_berita">
            <i class="fa fa-bullhorn"></i> <span>Info Bencana</span>
            
          </a>
         
        </li>
         <li class="active treeview">
          <a href="?mod=info_mitigasi">
            <i class="fa fa-newspaper-o"></i> <span>Info Mitigasi</span>
            
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

  <!-- Control Sidebar -->
  
</div>
<!-- ./wrapper -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="js/jquery.livequery.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript" src="js/wall.js"></script>
<script type="text/javascript" src="js/suggest.js"></script>
<!-- jQuery 2.2.3 -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>