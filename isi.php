<?php
$hal="$_GET[hal].php";
if (!file_exists($hal)) {
   include("barang_view.php");
}
else {
   include("$hal");
}
?>