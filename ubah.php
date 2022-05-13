<?php
require 'functions.php';


$id = $_GET["id"];

$pasien = query("SELECT * FROM pasien WHERE id=$id")[0];



if (isset($_POST["btnSubmit"])) {

    if (ubah($_POST) > 0) {
        echo "
        <script>alert('Data berhasil diubah');
        document.location.href='index.php';
        </script>
        ";
    } else {
        echo "
        <script>alert('Data gagal diubah');
        document.location.href='index.php';
        </script>
        ";
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
    <style>
        ul {
            list-style: none;
        }

        li {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <h1>Ubah Data Pasien</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pasien["id"]; ?>">

        <ul>
            <li>
                <label for="nama">Nama Pasien : </label> <br>
                <input type="text" name="nama" value="<?= $pasien["nama"]; ?>" id="nama" required>
            </li>
            <li>
                <label for="alamat">Alamat : </label> <br>
                <input type="text" name="alamat" value="<?= $pasien["alamat"]; ?>" id="alamat" required>
            </li>
            <li>
                <label>Kategori : </label> <br>

                <input type="radio" id="remaja" name="kategori" value="Remaja" <?= $pasien['kategori'] == 'Remaja' ? 'checked' : '' ?>>
                <label for="remaja"> Remaja</label><br>

                <input type="radio" id="dewasa" name="kategori" value="Dewasa" <?= $pasien['kategori'] == 'Dewasa' ? 'checked' : '' ?>>
                <label for="dewasa"> Dewasa</label><br>

                <input type="radio" id="lansia" name="kategori" value="Lansia" <?= $pasien['kategori'] == 'Lansia' ? 'checked' : '' ?>>
                <label for="lansia"> Lansia</label><br>
            </li>
            <li>
                <label>Jenis Kelamin : </label> <br>
                <input type="radio" id="jk" name="jk" value="Pria" <?= $pasien['jenisKelamin'] == 'Pria' ? 'checked' : '' ?>>
                <label for="jk">Pria</label><br>

                <input type="radio" id="jk" name="jk" value="Wanita" 
                <?= $pasien['jenisKelamin'] == 'Wanita' ? 'checked' : '' ?>>
                <label for="jk">Wanita</label><br>
            </li>
            <li>
                <button type="submit" name="btnSubmit">Tambah Data Pasien</button>
            </li>
        </ul>
    </form>

</body>

</html>