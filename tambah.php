<?php
require 'functions.php';



if ((isset($_POST['btnSubmit'])) && (isset($_POST['kategori'])) && (isset($_POST['jk'])) ) {
  
    if (tambah($_POST) > 0) {
        echo "
        <script>alert('Data berhasil ditambahkan');
        document.location.href='index.php';
        </script>
        ";   
    } else {
        echo "
        <script>alert('Data gagal ditambahkan');
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
    <h1>Tambah Data Pasien</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama Pasien : </label> <br>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="alamat">Alamat : </label> <br>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label>Kategori : </label> <br>

                <input type="radio" id="remaja" name="kategori" value="Remaja" required>
                <label for="remaja"> Remaja</label><br>

                <input type="radio" id="dewasa" name="kategori" value="Dewasa">
                <label for="dewasa"> Dewasa</label><br>

                <input type="radio" id="lansia" name="kategori" value="Lansia">
                <label for="lansia"> Lansia</label><br>
            </li>
            <li>
                <label >Jenis Kelamin : </label> <br>
                <input type="radio" id="jk" name="jk" value="Pria" required>
                <label for="jk">Pria</label><br>

                <input type="radio" id="jk" name="jk" value="Wanita">
                <label for="jk">Wanita</label><br>
            </li>
            <li>
                <button type="submit" name="btnSubmit">Tambah Data Pasien</button>
            </li>
        </ul>
    </form>
</body>

</html>