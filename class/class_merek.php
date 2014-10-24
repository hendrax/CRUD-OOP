<?php
class merek {
   function tampilMerek() {
      $tampil=mysql_query("SELECT * FROM merek ORDER BY kd_merek DESC");
      while($row=mysql_fetch_array($tampil))
      $data[]=$row;
      return $data;
   }

   function bacaDataMerek($kd_merek) {
      $baca=mysql_query("SELECT * FROM merek WHERE kd_merek='$kd_merek'");
      $data=mysql_fetch_array($baca);
      return $data;
   }

   function tambahMerek($merek) {
      $tambah=mysql_query("INSERT INTO merek(merek) VALUES('$merek')");
      if($tambah) {
         echo "<p><big>Data <b>BERHASIL</b> disimpan!</big></p>";
      }
      else {
         echo "<p><big>Data <b>GAGAL</b> disimpan!</big></p>";
      }
   }

   function updateMerek($kd_merek,$merek) {
      $update=mysql_query("UPDATE merek SET merek='$merek' WHERE kd_merek='$kd_merek'");
      if($update) {
         echo "<p><big>Data <b>BERHASIL</b> diupdate!</big></p>";
      }
      else {
         echo "<p><big>Data <b>GAGAL</b> diupdate!</big></p>";
      }
   }

   function hapusMerek($kd_merek) {
      $hapus=mysql_query("DELETE FROM merek WHERE kd_merek='$kd_merek'");
      if($hapus) {
         echo "<p><big>Data <b>BERHASIL</b> dihapus!</big> (<a href='?hal=merek_view'> <b>X</b> </a>)</p>";
      }
      else {
         echo "<p><big>Data <b>GAGAL</b> dihapus!</big> (<a href='?hal=merek_view'> <b>X</b> </a>)</p>";
      }
   }
}
?>