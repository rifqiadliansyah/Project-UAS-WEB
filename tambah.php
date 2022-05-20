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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>

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

    <div class="layout-main">   
        <h1>Tambah Data Pasien</h1>
    </div>

    <div class = "style-box">
        <form action="" method="post">
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
            </div><br>
            <div class="form-group row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
            </div><br>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-2 float-sm-left pt-0">Kategori</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="remaja" value="Remaja">
                        <label class="form-check-label" for="remaja">
                        Remaja
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="dewasa" value="Dewasa" >
                        <label class="form-check-label" for="dewasa">
                        Dewasa
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="kategori" id="lansia" value="Lansia" >
                        <label class="form-check-label" for="lansia">
                        Lansia
                        </label>
                    </div>
                </div>
            </fieldset><br>
            <fieldset class="form-group row">
                <legend class="col-form-label col-sm-2 float-sm-left pt-0">Jenis Kelamin</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Pria" >
                        <label class="form-check-label" for="jk">
                        Pria
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jk" id="jk" value="Wanita">
                        <label class="form-check-label" for="jk">
                        Wanita
                        </label>
                    </div>
                </div>
            </fieldset><br>

            <button type="submit" class="btn btn-primary" name="btnSubmit" value="Tambah">Tambah Data Pasien</button><br><br>

        </form>    
    </div>
    

    <!-- Boostrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font awesome (untuk icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</body>

</html>