<?php
require 'functions.php';
$pasien = query("SELECT * FROM pasien ORDER BY id DESC");

if (isset($_POST["btnCari"])) {
    $pasien = cari($_POST["keyword"]);
}
if (isset($_POST["btnAll"])) {
    $pasien = query("SELECT * FROM pasien ORDER BY id ");
}

// if(isset($_POST["btnStat"])){
//     $selectOpt = $_POST["stats"];
//     switch($selectOpt){
//         case 'statAlamat':
//             header("location: statAlamat.php");
//             break;
//         case 'statKategori':
//             header("location: statKategori.php");
//             break;
//         case 'statJk':
//             header("location: statJk.php");
//             break;    
//     }

// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <div class="isi">

<!-- 
        <form action="" method="POST">
            <h4>Lihat Statistik Pasien Berdasarkan</h4>
            <h4><select name="stats">
                    <option value="statAlamat">Alamat</option>
                    <option value="statKategori">Kategori Usia</option>
                    <option value="statJk">Jenis Kelamin</option>
                </select>
                <button type="submit" name="btnStat">Lihat</button>
            </h4>
        </form> -->



        <div class="p-3 mb-2 bg-success text-white">Jumlah data pasien (dinamis) : <?= $jumlahData; ?></div>


        <nav class="navbar navbar-light fs-5 mb-2" style="background-color: transparent;">
        <a  href="tambah.php" class="btn btn-primary text-decoration-none justify-content-left ms-1 mb-2" >Tambah data pasien</a><br>
        <a class="nav-search-bar justify-content-right text-decoration-none" href="">
            <form class="input-group " action="" method="post" style="margin-bottom: 8px ;">

                <input class="form-control" type="text" size="30" name="keyword" autofocus placeholder="Masukkan nama / alamat " autocomplete="off" class = "mt-2 mb-2">
                <button class="btn btn-outline-primary" type="submit" name="btnCari">Cari</button>
                <button class="btn btn-outline-primary me-3" type="submit" name="btnAll">Tampilkan Semua</button>


            </form>
        </a>
        

        <table class="table table-bordered text-center mt-2 ">
        <thead class="table-primary">
            <tr>
                <th>No.</th>
                <th>Edit Pasien</th>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>Kategori</th>
                <th>Jenis Kelamin</th>
            </tr>
        </thead>
            <?php $i = 1; ?>
            <?php foreach ($pasien as $p) :
            ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <!-- Ngrimin id -->
                        <a href="ubah.php?id=<?= $p["id"]; ?>" class="link-primary"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="hapus.php?id=<?= $p["id"]; ?>" class="link-danger" onclick="return confirm('Yakin?');"><i class="fa-solid fa-trash fs-5 "></i></a>
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

    <!-- Boostrap bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font awesome (untuk icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</body>

</html>