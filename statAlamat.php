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
    <style>
        .chart-container {
            position: relative;
            margin: auto;
            height: 80vh;
            width: 80vw;
        }
    </style>
</head>
<body>
    <div align="center">
        <h1>Statistik Pasien Berdasarkan Alamat</h1>
    </div>
    <div class="chart-container">
        <canvas id="myChart" width="400" height="100"></canvas>
    </div>

    <script>
        function randomColor() {
            const randomColor = Math.floor(Math.random() * 16777215).toString(16);
            return "#" + randomColor;
        }
        var xValues = <?php echo json_encode($namaAlamat); ?>;
        var yValues = <?php echo json_encode($jumlahAlamat); ?>;
        var barColors = [];
        for (let i = 0; i < xValues.length; i++) {
            let color = randomColor();
            barColors.push(color);
        }

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Data Pasien berdasarkan alamat',
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

</body>

</html>