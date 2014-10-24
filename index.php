<?php

//sertakan class yg diperlukan
include("class/class_waktu_load.php");
$waktuLoad = new waktuLoad();
$timestart = $waktuLoad->waktuAwal();

session_start();

include("class/class_koneksi.php");
include("class/class_login.php");

//instance objek barang dan koneksi
$koneksi = new koneksi();
$login = new login();

//koneksi ke db dengan method
$koneksi->konek();

// cek apakah user login atau tidak via method
if ($login->ambilSesi()) {
   echo "<script>location.href='admin.php';</script>";
}
?>
<title>CRUD OOP</title>
<link rel="stylesheet" href="style.css" type="text/css">
<div id="utama">
<h1>crud oop</h1>
<hr>
<br><br><br>
<div id="login">
<h2>LOGIN SISTEM</h2>
<form method="post">
<table id="tabel_form">
   <tr>
      <td>Username</td>
      <td><input type="text" name="username" size="10" autocomplete="off" placeholder="username" required></td>
   </tr>
   <tr>
      <td>Password</td>
      <td><input type="password" name="password" size="10" placeholder="password" required></td>
   </tr>
   <tr>
      <td align="center" colspan="2"><br><input type="submit" value="LOGIN"><br><br></td>
   </tr>
</table>
</form>
</div>
<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
   $ceklogin=$login->cekLogin($_POST['username'],$_POST['password']);
   if ($ceklogin) {
      echo "<script>location.href='admin.php';</script>";
   }
   else {
      die("<p align='center'><big>Login <b>GAGAL!</b></big><br>
           username atau password salah! ( <a href='index.php'><b>X</b></a> )</p>");
   }
}
if (!empty($_GET['eror'])) {
   die("<p align='center'>Anda belum <big>LOGIN</b></big><br>
        silahkan login terlebih dahulu untuk masuk ke sistem! ( <a href='index.php'><b>X</b></a> )</p>");
}
?>
</div>
<?php $waktuLoad->waktuAkhir($timestart); ?>  