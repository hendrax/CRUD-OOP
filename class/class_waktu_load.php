<?php
class waktuLoad {
   function waktuAwal() {
      // mengambil waktu awal
      $mtime = microtime();
      $mtime = explode (" ", $mtime);
      $mtime = $mtime[1] + $mtime[0];
      $timestart = $mtime;

      return $timestart;
   }

   function waktuAkhir($timestart) {
      // mengambil waktu selesai
      $mtime = microtime();
      $mtime = explode (" ", $mtime);
      $mtime = $mtime[1] + $mtime[0];
      $timeend = $mtime;

      // menghitung selisih
      $totaltime = ($timeend - $timestart);

      // menampilkan hasil
      echo "<span style='font:normal 28px Segoe UI;position:fixed;top:10px;left:10px;color:#666;padding:0 15px 10px 15px;background:#f8f8f8;border:1px solid #ccc;'>
               load <b>".substr($totaltime,0,5)."</b><sup>s</sup>
            </span>";
   }
}
?>