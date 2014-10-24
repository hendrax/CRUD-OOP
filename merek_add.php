<?php
//sertakan class yg diperlukan
include("class/class_merek.php");

//instance objek merek
$merek = new merek();
?>
<h2>Merek ADD</h2>
<a href="?hal=merek_view"> &lt;&lt; &nbsp;KEMBALI</a><br><br>
<form action="?hal=merek_add&aksi=x" method="post">
<table id="tabel_form">
   <tr>
      <td>Merek</td>
      <td><input type="text" name="merek" size="10" required></td>
   </tr>
   <tr>
      <td colspan="2"><input type="submit" value="SIMPAN"></td>
   </tr>
</table>
</form>
<?php
if (!empty($_GET['aksi'])) {
   $merek->tambahMerek($_POST['merek']);
}
?>