<?php

// Gambar aslinya
$filename = "gbr/$_GET[file]";

// ambil ukuran asli image
list($lebar_asli, $tinggi_asli) = getimagesize($filename);

$persegi = 100; //ukuran thumbnail, artinya 100 x 100;

$canvas = imagecreatetruecolor($persegi, $persegi);
$current_image = imagecreatefromjpeg($filename);

if($lebar_asli > $tinggi_asli){
    $tinggi = $persegi;
    $lebar =  ceil(($persegi/$tinggi_asli) * $lebar_asli);
    $x = ceil(($lebar/2) - ($persegi/2));
    imagecopyresized($canvas, $current_image, 0, 0, $x, 0, $lebar, $tinggi, $lebar_asli, $tinggi_asli);
}else{
    $lebar = $persegi;
    $tinggi = ceil(($persegi/$lebar_asli) * $tinggi_asli);
    $y = ceil(($tinggi/2) - ($persegi/2));
    imagecopyresized($canvas, $current_image, 0, 0, 0, $y, $lebar, $tinggi, $lebar_asli, $tinggi_asli);
}

header('Content-type: image/jpeg');

imagejpeg($canvas);

imagedestroy($canvas);

?>