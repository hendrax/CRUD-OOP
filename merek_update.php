<?php
//sertakan class yg diperlukan
include("class/class_merek.php");

//instance objek merek
$merek = new merek();

// buat array data merek dari method bacaDataBarang()
$tampil = $merek->bacaDataMerek($_GET['kd']);
?>
<h2>Merek UPDATE</h2>
<a href="?hal=merek_view"> &lt;&lt; &nbsp;KEMBALI</a><br><br>
<form action="?hal=merek_update&aksi=x" method="post">
<input type="hidden" name="kd_merek" value="<?php echo $tampil['kd_merek']; ?>">
<table id="tabel_form">
   <tr>
      <td>Merek</td>
      <td><input type="text" name="merek" size="10" value="<?php echo $tampil['merek']; ?>" required></td>
   </tr>
   <tr>
      <td colspan="2"><input type="submit" value="SIMPAN"></td>
   </tr>
</table>
</form>
<?php
if (!empty($_GET['aksi'])) {
   $merek->updateMerek($_POST['kd_merek'],$_POST['merek']);
}
?>