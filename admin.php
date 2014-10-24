<?php

//sertakan class yg diperlukan
include("class/class_waktu_load.php");
$waktuLoad = new waktuLoad();
$timestart = $waktuLoad->waktuAwal();
include("class/class_koneksi.php");
include("class/class_login.php");

session_start();

//instance objek koneksi dan login
$koneksi = new koneksi();
$login = new login();

//koneksi ke db dengan method
$koneksi->konek();

// cek apakah user login atau tidak via method
if (!$login->ambilSesi()) {
   echo "<script>location.href='index.php?eror=1';</script>";
}

if ($_GET['hal']=='logout') {
   $login->logOut();
   echo "<script>location.href='index.php';</script>";
}
?>
<title>CRUD OOP</title>
<link rel="stylesheet" href="style.css" type="text/css">
<div id="utama">
<h1>crud oop</h1>

<hr>
[ <a href="?hal=barang_view"><b>BARANG</b></a> ]
[ <a href="?hal=merek_view"><b>MEREK</b></a> ]
[ <a href="?hal=merek_statistik"><b>STATISTIK</b></a> ]

<span style="float: right;">
   <b><?php echo $login->ambilNama(); ?></b>
   [ <a href="?hal=logout" onclick="return confirm('Anda yakin akan keluar dari sistem??')"><b>LOGOUT</b></a> ]
</span>
<hr>
<?php include("isi.php"); ?>
</div>
<?php $waktuLoad->waktuAkhir($timestart); ?>