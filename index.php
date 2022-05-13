<?php
require 'functions.php';
$pasien = query("SELECT * FROM pasien ORDER BY id DESC");

if (isset($_POST["btnCari"])) {
    $pasien = cari($_POST["keyword"]);
}
if (isset($_POST["btnAll"])) {
    $pasien = query("SELECT * FROM pasien ORDER BY id ");
}

if(isset($_POST["btnStat"])){
    $selectOpt = $_POST["stats"];
    switch($selectOpt){
        case 'statAlamat':
            header("location: statAlamat.php");
            break;
        case 'statKategori':
            header("location: statKategori.php");
            break;
        case 'statJk':
            header("location: statJk.php");
            break;    
    }

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Projek Rekap Pasien Hepatitis Akut</h1>
    <div class="isi">


        <form action="" method="post" style="margin-bottom: 16px ;">

            <input type="text" size="40" name="keyword" autofocus placeholder="Masukkan nama / alamat ... " autocomplete="off">
            <button type="submit" name="btnCari">Cari</button>
            <button type="submit" name="btnAll">Tampilkan Semua</button>
        </form>

        <a style="margin-bottom: 16px;" href="tambah.php">
            <button> Tambah data pasien</button>
        </a>
        <br>

        <form action="" method="POST">
            <h4>Lihat Statistik Pasien Berdasarkan</h4>
            <h4><select name="stats">
                    <option value="statAlamat">Alamat</option>
                    <option value="statKategori">Kategori Usia</option>
                    <option value="statJk">Jenis Kelamin</option>
                </select>
                <button type="submit" name="btnStat">Lihat</button>
            </h4>
        </form>



        <h2>Jumlah data pasien (dinamis) : <?= $jumlahData; ?></h2>

        <br>
        <table cellpadding="10" cellspacing="0" border="1">
            <tr>
                <th>No.</th>
                <th>Edit Pasien</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Kategori</th>
                <th>Jenis Kelamin</th>
            </tr>
            <?php $i = 1; ?>
            <?php foreach ($pasien as $p) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <!-- Ngrimin id -->
                        <a href="ubah.php?id=<?= $p["id"]; ?>">Ubah</a>|
                        <a href="hapus.php?id=<?= $p["id"]; ?>" 
                        onclick="return confirm('Yakin?');">Hapus</a>
                    </td>
                    <td><?= $p["nama"]; ?></td>
                    <td><?= $p["alamat"]; ?></td>
                    <td><?= $p["kategori"]; ?></td>
                    <td><?= $p["jenisKelamin"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>

</html>