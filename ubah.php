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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <nav class="navbar navbar-light fs-5 mb-2" style="background-color: #8CC0DE;">
            <a class="nav-link active text-decoration-none"  href="index.php" style="color: #343434;">Projek Rekap Pasien Hepatitis Akut</a>
            <a class="nav-search-bar justify-content-right list-style-type none" href="">

                <li class="nav-item dropdown list-unstyled justify-content-right " >
                    <a class="nav-link dropdown-toggle" style="color: #343434;" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Lihat Statistik Pasien</a>
                    <ul class="dropdown-menu list-style-type-none">
                        <li><a class="dropdown-item" href="statAlamat.php">Alamat</a></li>
                        <li><a class="dropdown-item" href="statKategori.php">Kategori</a></li>
                        <li><a class="dropdown-item" href="statJk.php">Jenis Kelamin</a></li>
                    </ul>
                </li>

            </a>
    </nav>
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

    <!-- Boostrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font awesome (untuk icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</body>

</html>