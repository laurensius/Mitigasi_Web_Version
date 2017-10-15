
              <?php

// class paging untuk halaman berita (menampilkan semua berita)
class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halberita'])){
$posisi=0;
$_GET['halberita']=1;
}
else{
$posisi = ($_GET['halberita']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link ke halaman pertama (first) dan sebelumnya (prev)
if($halaman_aktif > 1){
$prev = $halaman_aktif-1;
$link_halaman .= "<a href=?mod=berita&halberita=1 ><i class='fa fa-angle-double-left'></i></a>
                  <a href=?mod=berita&halberita=$prev ><i class='fa fa-angle-left'></i></a>";
}
else{
$link_halaman .= "<i class='fa fa-angle-double-left'></i><i class='fa fa-angle-left'></i> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "..." : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<a href=?mod=berita&halberita=$i>$i</a>  ";
}
$angka .= " <span class='current'><b>$halaman_aktif</b></span>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<a href=?mod=berita&halberita=$i>$i</a>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "...<a href=?mod=berita&halberita=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <a href=?mod=berita&halberita=$next><i class='fa fa-angle-right'></i></a>
<a href=?mod=berita&halberita=$jmlhalaman><i class='fa fa-angle-double-right'></i></a> ";
}
else{
$link_halaman .= "<i class='fa fa-angle-right'></i> <i class='fa fa-angle-double-right'></i>";
}
return $link_halaman;
}
}


?>
