<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="input_katalog.css">
    <title>Update Katalog | Cozy Furniture</title>
</head>
<body>
    <div class="header-brand">
        <div class="first_name">cozy</div>
        <div class="last_name">furniture</div>
    </div>
    <div class="navigation">
        <li><a href="admin_page.html" title="Back"><i class="fa-solid fa-arrow-left"></i></a></li>
    </div>
    <div class="content">
        <form action="" method = "post" enctype="multipart/form-data">
        <h3>Update katalog</h3>

            <label for="">kode barang</label>
            <input type="text" name="kode_katalog" placeholder="kode katalog"><br>

            <label for="">Nama barang</label>
            <input type="text" name="nama_katalog" placeholder="nama katalog"><br><br>

            <label for="">warna barang</label>
            <input type="text" name="warna_katalog" placeholder="warna katalog"><br><br>

            <label for="">jenis barang</label>
            <input type="text" name="jenis_katalog" placeholder="jenis katalog"><br><br>

            <label for="">upload gambar katalog</label><br>
            <input type="file" name="foto_katalog" placeholder="foto katalog"><br><br>

            <input type="hidden" name="tanggal_upload" value= <?=date("d-m-Y")?> >
            <input type="submit" name="kirim" value="kirim" class="button">
        </form>
    </div>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Natalie Fuad
    </div>
</body>
</html>

<?php
    require 'config.php';

    if ($op == 'edit') {
        $id = $_GET['id'];
        $sql1 = "select * from mahasiswa where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        $row = mysqli_fetch_array($q1);
        
        $kode_katalog = $row['kode_katalog'];
        $nama_katalog = $row['nama_katalog'];
        $warna_katalog = $row['warna_katalog'];
        $jenis_katalog = $row['jenis_katalog'];
    }

    if(isset($_POST['kirim'])){
        $kode_katalog = $_POST['kode_katalog'];
        $nama_katalog = $_POST['nama_katalog'];
        $warna_katalog = $_POST['warna_katalog'];
        $jenis_katalog = $_POST['jenis_katalog'];

        $gambar = $_FILES['foto_katalog']['name'];
        $x = explode('.', $gambar);

        $ekstensi = strtolower(end($x));
        $gambar_baru = "$kode_katalog.$ekstensi";

        $tmp = $_FILES['foto_katalog']['tmp_name'];
    }
    
    if (isset($_POST['simpan'])) { //untuk create
        $kode_katalog = $_POST['kode_katalog'];
        $nama_katalog = $_POST['nama_katalog'];
        $warna_katalog = $_POST['warna_katalog'];
        $jenis_katalog = $_POST['jenis_katalog'];

        $gambar = $_FILES['foto_katalog']['name'];
        $x = explode('.', $gambar);

        $ekstensi = strtolower(end($x));
        $gambar_baru = "$kode_katalog.$ekstensi";

        $tmp = $_FILES['foto_katalog']['tmp_name'];

        if ($kode_katalog && $nama_katalog && $warna_katalog && $jenis_katalog && $gambar_baru) {
            if ($op == 'edit') { //untuk update
                $query = "UPDATE katalog ()kode_katalog, nama_katalog, warna_katalog, jenis_katalog, foto_katalog
                        VALUES ('$kode_katalog', '$nama_katalog', '$warna_katalog', '$jenis_katalog', '$foto_katalog')";
                $q1    = mysqli_query($db, $query);
                if ($q1) {
                    $sukses = "Data berhasil diupdate";
                } else {
                    $error  = "Data gagal diupdate";
                }
            } else { //untuk insert
                $query = "INSERT INTO katalog SET kode_katalog='$kode_katalog', nama_katalog='$nama_katalog', warna_katalog='$warna_katalog', jenis_katalog='$jenis_katalog', foto_katalog='$gambar'
                        WHERE kode_katalog='$kode_katalog')";
                $q1    = mysqli_query($db, $query);
                if ($q1) {
                    $sukses     = "Berhasil memasukkan data baru";
                } else {
                    $error      = "Gagal memasukkan data";
                }
            }
        }
    }
?>  