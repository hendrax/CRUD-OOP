<?php
//sertakan class yg diperlukan
include("class/class_barang.php");

//instance objek barang
$barang = new barang();
?>
<script type="text/javascript">
function PreviewImage() {
   var oFReader = new FileReader();
   oFReader.readAsDataURL(document.getElementById("gambar").files[0]);

   oFReader.onload = function (oFREvent) {
   document.getElementById("preview_gbr").src = oFREvent.target.result;
   }
}
</script>
<h2>Barang ADD</h2>
<a href="?hal=barang_view"> &lt;&lt; &nbsp;KEMBALI</a><br><br>
<form action="?hal=barang_add&aksi=add" method="post" enctype="multipart/form-data">
<table id="tabel_form">
   <tr>
      <td>Merek</td>
      <td><?php $barang->comboMerek(x); ?></td>
      <td rowspan="4">
         <img id="preview_gbr" style="width: 140px; height: 140px;"><br>
         <input type="file" name="gambar" id="gambar" size="5" onchange="PreviewImage()" style="width: 140px;">
      </td>
   </tr>
   <tr>
      <td>Nama</td>
      <td><input type="text" name="nama_brg" size="30" required></td>
   </tr>
   <tr>
      <td>Stok</td>
      <td><input type="text" name="stok" size="3" required></td>
   </tr>
   <tr>
      <td>Size</td>
      <td><?php $barang->radioSize(x); ?></td>
   </tr>
   <tr>
      <td colspan="3"><input type="submit" value="SIMPAN"></td>
   </tr>
</table>
</form>
<?php
if (!empty($_GET['aksi'])) {
   if (!empty($_FILES['gambar']['name'])) {
      $gambar = $_FILES['gambar']['name'];
      $acak = rand(0000,9999);
      $nama_file_unik = $acak.$gambar;
   }
   $barang->tambahBarang($_POST['kd_merek'],$_POST['nama_brg'],$_POST['stok'],$_POST['size'],$nama_file_unik);
}
?>