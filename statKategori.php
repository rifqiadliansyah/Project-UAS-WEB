<?php
require 'functions.php';

$queryKategori = query("SELECT kategori, COUNT(kategori) AS jumlah FROM pasien GROUP BY kategori");
$jenisKategori = [];
$jumlahKategori = [];

foreach ($queryKategori as $k) {
    $jenisKategori[] = $k["kategori"];
    $jumlahKategori[] = $k["jumlah"];
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <h1>Statistik Pasien Berdasarkan Kategori Usia</h1>
    </div><br><br>
    <div class="chart-container-usia">
        <canvas id="myChart" width="400" height="100"></canvas>
    </div>
    <script>
        function randomColor() {
            const randomColor = Math.floor(Math.random() * 16777215).toString(16);
            return "#" + randomColor;
        }
        var xValues = <?php echo json_encode($jenisKategori); ?>;
        var yValues = <?php echo json_encode($jumlahKategori); ?>;
        var barColors = [];
        for (let i = 0; i < xValues.length; i++) {
            let color = randomColor();
            barColors.push(color);
        }

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Data Pasien berdasarkan Kategori Usia',
                    backgroundColor: barColors,
                    data: yValues,
                    borderWidth: 2
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                }
            }
        });
    </script>
     <!-- Boostrap bundle -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- font awesome (untuk icon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</body>

</html>