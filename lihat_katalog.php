<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="katalog_list.css">
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
        <div class="content">
            <div class="content-box">
                <h3>daftar katalog</h3>
                <a href="input_katalog.php"></a>
                <table border=1>
                    <tr>
                        <th>NO</th>
                        <th>Kode katalog</th>
                        <th>Nama Katalog</th>
                        <th>Warna Katalog</th>
                        <th>Jenis Katalog</th>
                        <th>Gambar Katalog</th>
                    </tr>
                    <?php 
                        require 'config.php';
                        $result = $db->query("SELECT * FROM katalog");
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){
                    ?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$row['kode_katalog']?></td>
                        <td><?=$row['nama_katalog']?></td>
                        <td><?=$row['warna_katalog']?></td>
                        <td><?=$row['jenis_katalog']?></td>
                        <td><img src="gambar_katalog/ <?php echo $row['foto_katalog']; ?>" alt="" width="100px"></td>
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