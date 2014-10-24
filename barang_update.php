<?php
//sertakan class yg diperlukan
include("class/class_barang.php");

//instance objek barang
$barang = new barang();

// buat array data barang dari method bacaDataBarang()
$tampil = $barang->bacaDataBarang($_GET['kd']);
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
<h2>Barang UPDATE</h2>
<a href="?hal=barang_view"> &lt;&lt; &nbsp;KEMBALI</a><br><br>
<form action="?hal=barang_update&aksi=update" method="post" enctype="multipart/form-data">
<input type="hidden" name="kd_barang" value="<?php echo $tampil['kd_barang']; ?>">
<table id="tabel_form">
   <tr>
      <td>Merek</td>
      <td><?php $barang->comboMerek($tampil['kd_merek']); ?></td>
      <td rowspan="5">
         <img id="preview_gbr" style="width: 160px; height: 160px;" src="gbr/<?php echo $tampil['gambar']; ?>"><br>
         <input type="file" name="gambar" id="gambar" size="5" onchange="PreviewImage()" style="width: 160px;"><br>
         format harus ( <b>.jpg</b> )
         <input type="hidden" name="gambar_lama" value="<?php echo $tampil['gambar']; ?>">
      </td>
   </tr>
   <tr>
      <td>Nama</td>
      <td><input type="text" name="nama_brg" size="30" value="<?php echo $tampil['nama_brg']; ?>" required></td>
   </tr>
   <tr>
      <td>Stok</td>
      <td><input type="text" name="stok" size="3" value="<?php echo $tampil['stok']; ?>" required></td>
   </tr>
   <tr>
      <td>Terjual</td>
      <td><input type="text" name="terjual" size="3" value="<?php echo $tampil['terjual']; ?>" required></td>
   </tr>
   <tr>
      <td>Size</td>
      <td><?php $barang->radioSize($tampil['size']); ?></td>
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
   $barang->updateBarang($_POST['kd_barang'],$_POST['kd_merek'],$_POST['nama_brg'],$_POST['stok'],$_POST['terjual'],$_POST['size'],$nama_file_unik,$_POST['gambar_lama']);
}
?>