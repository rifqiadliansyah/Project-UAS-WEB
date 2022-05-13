<?php
require 'functions.php';

$alamatStat = query("SELECT alamat, COUNT(alamat) AS jumlah FROM pasien GROUP BY alamat");
// var_dump($alamatStat);

$namaAlamat = [];
$jumlahAlamat = [];
foreach ($alamatStat as $a) {
    $namaAlamat[] = $a["alamat"];
    $jumlahAlamat[] = $a["jumlah"];
}

// var_dump($namaAlamat);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div align="center">
        <h1>Statistik Pasien Berdasarkan Alamat</h1>
    </div>
    <div>
        <canvas id="myChart" width="400" height="100">

        </canvas>
    </div>

    <script>
        var xValues = <?php echo json_encode($namaAlamat); ?>;;
        var yValues = <?php echo json_encode($jumlahAlamat); ?>;;
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Data Pasien berdasarkan alamat',
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "World Wine Production 2018"
                }
            }
        });
    </script>

</body>

</html>