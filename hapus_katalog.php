<?php

require 'config.php';

$del = $_POST['kode_katalog'];
$query = sprintf("DELETE FROM katalog WHERE kode_katalog = '$kode_katalog'");

$query2 = "SELECT * FROM katalog WHERE kode_katalog = '$kode_katalog'";

$a = mysqli_query($proses2, $conn);
$b = mysqli_fetch_array($a);

unlink("gambar_katalog/$b[foto]");

$del2 = mysqli_query($proses, $conn);

if($del2){
    echo "Berhasil menghapus";
} else {
    echo "GAGAL MENGHAPUS";
}

?>