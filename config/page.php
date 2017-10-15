<?php 
//SourceCode by AndezNET.com
$judul				= "";
$ambil				= "home.php";
$ambilcss1			="";
$ambilcss2			="";
$ambilcss3			="";
$ambilcss4			="";
$ambilcss5			="";
$ambilcss6			="";
$ambilcss7			="";
$ambilcss8			="";
$ambilcss9			="";
$ambilcss10			="";
$ambiljs0			="";
$ambiljs1			="";
$ambiljs2			="";
$ambiljs3			="";
$ambiljs4			="";
$ambiljs5			="";
$ambiljs6			="";
$ambiljs7			="";
$ambiljs8			="";
$ambiljs9			="";
$ambiljs10			="";
$ambiljs11			="";
$ambiljs12			="";
$ambilfungsi		="";
$ambilfungsi2		="";



$id 				= isset($_GET['id']) ? $_GET['id'] : "";
if ($id == "") {
    $judul 				= "Dashboard";
    $ambil 				= "home.php";
    $ambiljs1			= "";
    $ambiljs2			="assets/js/zabuto_calendar.js";
    $ambilfungsi		="config/fungsi_kalender.php";
	$classmenu1			="active";

} elseif ($id == "inbox") {
    $judul 				= "Kotak Masuk";
    $ambil 				= "inbox/inbox.php";
    $ambiljs1           = "assets/js/inbox.js";
	$classmenu2			="active";

} elseif ($id == "sent") {
    $judul 				= "Pesan Terkirim";
    $ambil 				= "sent/sent.php";
    $ambiljs1           = "assets/js/sent.js";
	$classmenu4			="active";

} elseif ($id == "outbox") {
    $judul 				= "Kotak Keluar";
    $ambil 				= "outbox/outbox.php";
    $ambiljs1           = "assets/js/outbox.js";
	$classmenu3			="active";

} elseif ($id == "pb") {
    $judul 				= "Daftar Kontak";
    $ambil 				= "phonebook/phonebook.php";
    $ambiljs1           = "assets/js/pb.js";
	$classmenu8			="active";
	
} elseif ($id == "auto") {
    $judul 				= "Setting AutoReply";
    $ambil 				= "autoreply/auto.php";
    $ambiljs1           = "assets/js/autoreply.js";
	$classmenu7			="active";
	
} elseif ($id == "schedule") {
    $judul 				= "Setting AutoSchedule";
    $ambil 				= "autoschedule/autoschedule.php";
    $ambiljs1           = "assets/js/autoschedule.js";
	$classmenu5			="active";
	

} elseif ($id == "grp") {
    $judul              = "Daftar Group";
    $ambil              = "group/group.php";
    $ambiljs1           = "assets/js/group.js";
	$classmenu9			="active";

}elseif ($id == "profile") {
        $judul 				= "Profile";
        $ambil 				= "profile.php";
        $ambiljs1           = "assets/js/jquery.validate.min.js";
        $ambilfungsi		="config/fungsi_profile.php";
		$classmenu6			="active";

} else {
    $Judul 				= "Dashboard";
    $ambil 				= "home.php";
    $ambiljs1			= "";
    $ambiljs2			="assets/js/zabuto_calendar.js";
    $ambilfungsi		="config/fungsi_kalender.php";
	$classmenu1			="active";


//SourceCode by AndezNET.com
}

?>