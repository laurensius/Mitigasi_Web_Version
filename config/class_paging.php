<div class="box-tools pull-right">
                <ul class="pagination pagination-sm inline">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
              
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
$link_halaman .= "<a href=beranda.php?mod=berita2&halberita=1 class='nextprev'>&laquo; First</a>
                  <a href=beranda.php?mod=berita2&halberita=$prev class='nextprev'>&lt; Prev</a>";
}
else{
$link_halaman .= "<span class='nextprev'>&laquo; First</span><span class='nextprev'><i class='fa fa-chevron-left'></i> Prev </span> ";
}

// Link halaman 1,2,3, …
$angka = ($halaman_aktif > 3 ? "<span class='nextprev'>...</span>" : " ");
for ($i=$halaman_aktif-2; $i<$halaman_aktif; $i++){
if ($i < 1)
continue;
$angka .= "<a href=beranda.php?mod=berita2&halberita=$i>$i</a>  ";
}
$angka .= " <span class='current'><b>$halaman_aktif</b></span>";

for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++){
if($i > $jmlhalaman)
break;
$angka .= "<a href=beranda.php?mod=berita2&halberita=$i>$i</a>  ";
}
$angka .= ($halaman_aktif+2<$jmlhalaman ? "<span class='nextprev'>...</span><a href=beranda.php?mod=berita2&halberita=$jmlhalaman>$jmlhalaman</a> " : " ");

$link_halaman .= "$angka";

// Link ke halaman berikutnya (Next) dan terakhir (Last)
if($halaman_aktif < $jmlhalaman){
$next = $halaman_aktif+1;
$link_halaman .= " <a href=beranda.php?mod=berita2&halberita=$next class='nextprev'>Next &gt;</a>
<a href=beranda.php?mod=berita2&halberita=$jmlhalaman class='nextprev'>Last &raquo;</a> ";
}
else{
$link_halaman .= " <span class='nextprev'>Next  &gt;</span> <span class='nextprev'> Last &raquo;</span>";
}
return $link_halaman;
}
}


?>
</div>