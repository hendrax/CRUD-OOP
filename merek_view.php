<?php
//sertakan class yg diperlukan
include("class/class_merek.php");

//instance objek merek
$merek = new merek();

// buat array data merek dari method tampilmerek()
$tampil = $merek->tampilMerek();
?>
<h2>Merek VIEW</h2>
<a href="?hal=merek_add">++ TAMBAH DATA</a><br><br>
<table id="tabel_data">
   <tr>
      <th>No.</th>
      <th>Merek</th>
      <th>Aksi</th>
   </tr>
   <?php
   $no=1;
   foreach($tampil as $data) {
      echo "<tr>
               <td>$no.</td>
               <td>$data[merek]</td>
               <td><a href='?hal=merek_update&kd=$data[kd_merek]'>edit</a> |
                   <a href='?hal=merek_view&kd=$data[kd_merek]' onclick=\"return confirm('Anda yakin akan menghapus??')\">hapus</a>
               </td>
            </tr>";
            $no++;
   }
   ?>
</table>

<?php
if (!empty($_GET['kd'])) {
   $merek->hapusMerek($_GET['kd']);
}
?>