<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="fontawesome/fontawesome-free-6.2.0-web/css/all.css">
    <link rel="stylesheet" href="katalog.css">
    <title>Katalog | Cozy Furniture</title>
</head>
<body>
    <div class="header-brand">
        <div class="first_name">cozy</div>
        <div class="last_name">furniture</div>
    </div>
    <div class="navigation">
        <li><a href="admin_page.html" title="Back"><i class="fa-solid fa-arrow-left"></i></a></li>

    </div>
    <div class="container">
        <div class="wrapper">
            <div class="crud">
                <li class="text">halaman CRUD katalog</li>
            </div>
            <div class="content-box">
                <li><a href="input_katalog.php" title="Input"><i class="fa-solid fa-file-circle-plus fa-xm"></i><p>input</p></a></li>
                <h3>daftar katalog</h3>
                <a href="input_katalog.php"></a>
                <table>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode katalog</th>
                        <th scope="col">Nama Katalog</th>
                        <th scope="col">Warna Katalog</th>
                        <th scope="col">Jenis Katalog</th>
                        <th scope="col">Gambar Katalog</th>
                    </tr>
                    <?php 
                        require 'config.php';
                        $result = $db->query("SELECT * FROM katalog");
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td scope="row"><?=$i?></td>
                        <td scope="row"><?=$row['kode_katalog']?></td>
                        <td scope="row"><?=$row['nama_katalog']?></td>
                        <td scope="row"><?=$row['warna_katalog']?></td>
                        <td scope="row"><?=$row['jenis_katalog']?></td>
                        <td scope="row"><img src="gambar_katalog/ <?php echo $row['foto_katalog']; ?>" alt="" width="100px"></td>
                        <td scope="row"><a href="katalog.php?op=update&id<?php echo $id?>"><button type="button">UPDATE</button></a></td>
                        <td scope="row"><a href="katalog.php?op=hapus&id<?php echo $id?>"><button type="button">DELETE</button></a></td>
                    </tr>
                        <?php
                            $i++;}
                        ?>
                </table>
            </div>
        </div>
    </div>
    <div class="footer-c">
        Copyright &copy; 2022 Designed by Natalie Fuad
    </div>
</body>
</html>