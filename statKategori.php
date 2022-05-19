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
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            margin: auto;
            height: 40vh;
            width: 40vw;
        }
    </style>
</head>

<body>
    <div align="center">
        <h1>Statistik Pasien Berdasarkan Kategori Usia</h1>
    </div>
    <div class="chart-container">
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
</body>

</html>