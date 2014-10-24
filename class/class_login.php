<?php
class login {
   //proses cek login
   function cekLogin($usernama,$pasword) {
      $pasword = md5($pasword);
      $query=mysql_query("SELECT * FROM user WHERE usernama='$usernama' and pasword='$pasword'");
      $cek=mysql_fetch_array($query);
      $data=mysql_num_rows($query);

      if ($data==1) {
         $_SESSION['xxxlogin'] = TRUE;
         $_SESSION['xxxkd'] = $cek['kd_user'];
         $_SESSION['xxxnama'] = $cek['usernama'];
         return TRUE;
      }
      else {
         return FALSE;
      }
   }

   function ambilNama() {
      return $_SESSION['xxxnama'];
   }

   //ambil sesi
   function ambilSesi() {
      return $_SESSION['xxxlogin'];
   }

   //logout
   function logOut() {
      $_SESSION['xxxlogin'] = FALSE;
      unset($_SESSION['xxxkd']);
      unset($_SESSION['xxxnama']);
   }
}
?>