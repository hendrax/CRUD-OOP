<?php
//sertakan class yg diperlukan
include("class/class_barang.php");
include("class/class_paging.php");

//instance objek barang
$barang = new barang();
$paging = new paging();

$hal = "barang_view";
$batas  = 2;
$posisi = $paging->cariPosisi($batas);

$katakunci="";
$link="";
if (!empty($_GET['cari'])) {
   $katakunci=$_GET['cari'];
   $link="&cari=$katakunci";
}

// mendefenisikan kondisi query untuk tampil data
if ($katakunci!="") {
   $query = "SELECT * FROM barang INNER JOIN merek ON barang.kd_merek=merek.kd_merek WHERE barang.nama_brg LIKE '%$katakunci%' OR merek.merek LIKE '%$katakunci%' ORDER BY barang.kd_barang DESC";
}
else {
   $query = "SELECT * FROM barang INNER JOIN merek ON barang.kd_merek=merek.kd_merek ORDER BY barang.kd_barang DESC";
}

// buat array data barang dari method tampilBarang()
$tampil = $barang->tampilBarang($query,$posisi,$batas);
?>
<h2>Barang VIEW</h2>
<a href="?hal=barang_add">++ TAMBAH DATA</a>
<p>
<form action="?hal=barang_view" method="get">
   <input type="search" name="cari" size="20" placeholder="cari nama barang.." value="<?php echo $katakunci; ?>" required title="Silahkan masukan kata kunci!">
   <input type="submit" value="GO">
</form>
</p>
<table id="tabel_data">
   <tr>
      <th>No.</th>
      <th>Nama Barang</th>
      <th>Gambar</th>
      <th>Merek</th>
      <th>Size</th>
      <th>Stok</th>
      <th>Terjual</th>
      <th>Aksi</th>
   </tr>
   <?php
   $no=1;
   foreach($tampil as $data) {
      echo "<tr>
               <td>$no.</td>
               <td>$data[nama_brg]</td>
               <td><img src='gambar.php?file=$data[gambar]' width='80'></td>
               <td>$data[merek]</td>
               <td>$data[size]</td>
               <td>$data[stok]</td>
               <td>$data[terjual] kali</td>
               <td><a href='?hal=barang_update&kd=$data[kd_barang]'>edit</a> |
                   <a href='?hal=barang_view&aksi=del&kd=$data[kd_barang]&gbr=$data[gambar]' onclick=\"return confirm('Anda yakin akan menghapus??')\">hapus</a>
               </td>
            </tr>";
            $no++;
   }
   ?>
</table>
<?php
$jmldata      = $barang->jumlahData($query);
$jmlhalaman   = $paging->jumlahHalaman($jmldata, $batas);
$linkHalaman  = $paging->navHalaman($hal,$_GET['page'], $jmlhalaman,$katakunci,$link);

echo "<div class='nav'>$linkHalaman</div>";
?>

<?php
if ($_GET['aksi']=="del") {
   $barang->hapusBarang($_GET['kd'],$_GET['gbr']);
}
?>