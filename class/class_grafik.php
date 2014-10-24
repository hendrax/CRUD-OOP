<?php
class grafik {
   function kolomMerek() {
      $tampil=mysql_query("SELECT * FROM merek ORDER BY kd_merek DESC");
      while($kolom=mysql_fetch_array($tampil)) {
         echo "<td>$kolom[merek]</td>";
      }
   }

   function kolomJumlah() {
      $tampil=mysql_query("SELECT SUM(barang.terjual) as total FROM merek
                           LEFT JOIN barang ON merek.kd_merek=barang.kd_merek
                           GROUP BY merek.merek ORDER BY merek.kd_merek DESC");
      while($jumlah=mysql_fetch_array($tampil)) {
         if (empty($jumlah['total'])) {
            echo "<td>0</td>";
         }
         else {
            echo "<td>$jumlah[total]</td>";
         }
      }
   }
}
?>