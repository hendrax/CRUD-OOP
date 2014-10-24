<?php
class paging {
  function cariPosisi($batas){
    if(empty($_GET['page'])){
    	$posisi=0;
    	$_GET['page']=1;
    }
    else{
    	$posisi = ($_GET['page']-1) * $batas;
    }
    return $posisi;
  }

  function jumlahHalaman($jmldata, $batas){
    $jmlhalaman = ceil($jmldata/$batas);
    return $jmlhalaman;
  }

  function navHalaman($hal,$halaman_aktif, $jmlhalaman,$katakunci,$link){
    $link_halaman = "";

    //menampilkan link first
    if ($halaman_aktif > 1) {
      $link_halaman .= "<a href=?hal=$hal&page=1$link><<</a> ";
    }
    else {
      $link_halaman .= "<span class='disabled'><<</span> ";
    }

    //menampilkan link previous
    if ($halaman_aktif > 1) {
      $prev = $halaman_aktif - 1;
      $link_halaman .= "<a href=?hal=$hal&page=$prev$link><</a> ";
    }
    else {
      $link_halaman .= "<span class='disabled'><</span> ";
    }

    //menampilkan link 1,2,3
    for ($i=1; $i<=$jmlhalaman; $i++){
      if ($i == $halaman_aktif){
         $link_halaman .= "<span class='current'>$i</span> ";
      }
      else{
         $link_halaman .= "<a href=?hal=$hal&page=$i$link>$i</a> ";
      }
      $link_halaman .= " ";
    }

    //menampilkan link next
    if ($halaman_aktif < $jmlhalaman) {
      $next = $halaman_aktif + 1;
      $link_halaman .= "<a href=?hal=$hal&page=$next$link>></a> ";
    }
    else {
      $link_halaman .= "<span class='disabled'>></span> ";
    }

    //menampilkan link last
    if ($halaman_aktif < $jmlhalaman) {
      $link_halaman .= "<a href=?hal=$hal&page=$jmlhalaman$link>>></a> ";
    }
    else {
      $link_halaman .= "<span class='disabled'>>></span> ";
    }

    return $link_halaman;
  }
}

?>