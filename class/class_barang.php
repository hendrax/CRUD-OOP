<?php
class barang {
   function tampilBarang($query,$posisi,$batas) {
      $tampil=mysql_query("$query LIMIT $posisi, $batas");
      while($row=mysql_fetch_array($tampil))
      $data[]=$row;
      return $data;
   }

   function jumlahData($query) {
      $data=mysql_query("$query");
      $jumdata=mysql_num_rows($data);
      return $jumdata;
   }

   function bacaDataBarang($kd_barang) {
      $baca=mysql_query("SELECT * FROM barang WHERE kd_barang='$kd_barang'");
      $data=mysql_fetch_array($baca);
      return $data;
   }

   function tambahBarang($kd_merek,$nama_brg,$stok,$size,$gambar) {
      $field="";
      $data="";
      if (!empty($gambar)) {
         $field=",gambar";
         $data=",'$gambar'";
         move_uploaded_file($_FILES['gambar']['tmp_name'], 'gbr/'.$gambar);
      }
      $tambah=mysql_query("INSERT INTO barang(kd_merek,nama_brg,stok,size $field) VALUES('$kd_merek','$nama_brg','$stok','$size' $data)");
      if($tambah) {
         echo "<p><big>Data <b>BERHASIL</b> disimpan!</big></p>";
      }
      else {
         echo "<p><big>Data <b>GAGAL</b> disimpan!</big></p>";
      }
   }

   function updateBarang($kd_barang,$kd_merek,$nama_brg,$stok,$terjual,$size,$gambar,$gambar_lama) {
      $querygbr="";
      if (!empty($gambar)) {
         $querygbr=", gambar='$gambar' ";
         move_uploaded_file($_FILES['gambar']['tmp_name'], 'gbr/'.$gambar);
         if (!empty($gambar_lama)) {
            unlink("gbr/$gambar_lama");
         }
      }
      $update=mysql_query("UPDATE barang SET kd_merek='$kd_merek', nama_brg='$nama_brg', stok='$stok', terjual='$terjual', size='$size' $querygbr
                           WHERE kd_barang='$kd_barang'");
      if($update) {
         echo "<p><big>Data <b>BERHASIL</b> diupdate!</big></p>";
      }
      else {
         echo "<p><big>Data <b>GAGAL</b> diupdate!</big></p>";
      }
   }

   function hapusBarang($kd_barang,$gbr) {
      if (!empty($gbr)) {
         unlink("gbr/$gbr");
      }
      $hapus=mysql_query("DELETE FROM barang WHERE kd_barang='$kd_barang'");
      if($hapus) {
         echo "<p><big>Data <b>BERHASIL</b> dihapus!</big> (<a href='?hal=barang_view'> <b>X</b> </a>)</p>";
      }
      else {
         echo "<p><big>Data <b>GAGAL</b> dihapus!</big> (<a href='?hal=barang_view'> <b>X</b> </a>)</p>";
      }
   }

   function comboMerek($kd_merek) {
      $combo=mysql_query("SELECT * FROM merek");
      echo "<select name='kd_merek' required>";
      while($merek=mysql_fetch_array($combo)) {
         if($merek['kd_merek']==$kd_merek) {
            echo "<option value='$merek[kd_merek]' selected>$merek[merek]</option>";
         }
         else {
            echo "<option value='$merek[kd_merek]'>$merek[merek]</option>";
         }
      }
      echo "</select>";
   }

   function radioSize($size) {
      $radio="L,M,S";
      $radiosize=explode(',',$radio);

      for($i=0; $i<=2; $i++) {
         if($radiosize[$i]==$size) {
            echo "<span style='padding:2px; margin:2px; border:1px solid #ccc;'>
                  <input type='radio' name='size' value='$radiosize[$i]' required checked><b>$radiosize[$i]</b>
                  &nbsp;</span>";
         }
         else {
            echo "<span style='padding:2px; margin:2px; border:1px solid #ccc;'>
                  <input type='radio' name='size' value='$radiosize[$i]' required><b>$radiosize[$i]</b>
                  &nbsp;</span>";
         }
      }
   }
}
?>