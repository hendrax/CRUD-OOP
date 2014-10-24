<?php
class koneksi {
   private $host="localhost";
   private $user="root";
   private $pass="";
   private $dbase="latihan";

   function konek() {
      mysql_connect($this->host, $this->user, $this->pass);
      mysql_select_db($this->dbase) or die("Database tidak ada");
   }
}
?>