<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Survey Dampak Teknologi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #222831;
            color: #EEEEEE;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 30px;
            max-width: 800px;
            background-color: #393E46;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h2 {
            color: #00ADB5;
        }
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        .table-container {
            margin-top: 30px;
            background-color: #393E46;
            padding: 15px;
            border-radius: 10px;
            color: #EEEEEE;
        }
        table {
            color: #EEEEEE;
        }
        th, td {
            padding: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 class="text-center">Hasil Survey Dampak Teknologi</h2>

        <!-- Grafik 1 -->
        <div class="chart-container mt-4">
            <canvas id="chart1"></canvas>
        </div>

        <!-- Grafik 2 -->
        <div class="chart-container mt-4">
            <canvas id="chart2"></canvas>
        </div>

        <!-- Grafik 3 -->
        <div class="chart-container mt-4">
            <canvas id="chart3"></canvas>
        </div>

        <!-- Tabel Data -->
        <div class="table-container mt-5">
            <h4 class="text-center">Tabel Hasil Survei</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dampak Teknologi terhadap Lingkungan</th>
                        <th>Pengaruh Teknologi terhadap Gaya Hidup</th>
                        <th>Peran Teknologi dalam Masalah Lingkungan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Koneksi ke database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "survey_db";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mendapatkan data survei
                    $sql = "SELECT name, email, q1, q2, q3 FROM survey_responses";
                    $result = $conn->query($sql);

                    // Inisialisasi array untuk menghitung jawaban
                    $data_q1 = ["Positif" => 0, "Negatif" => 0, "Netral" => 0];
                    $data_q2 = ["Sangat Besar" => 0, "Besar" => 0, "Kecil" => 0, "Tidak Terlalu Mempengaruhi" => 0];
                    $data_q3 = ["Ya, Berperan" => 0, "Tidak, Tidak Berperan" => 0, "Sebagian Berperan" => 0];

                    // Loop untuk menampilkan hasil survei di tabel dan menghitung data untuk grafik
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['q1'] . "</td>";
                            echo "<td>" . $row['q2'] . "</td>";
                            echo "<td>" . $row['q3'] . "</td>";
                            echo "</tr>";

                            // Hitung jumlah jawaban untuk grafik
                            if (array_key_exists($row['q1'], $data_q1)) {
                                $data_q1[$row['q1']]++;
                            }
                            if (array_key_exists($row['q2'], $data_q2)) {
                                $data_q2[$row['q2']]++;
                            }
                            if (array_key_exists($row['q3'], $data_q3)) {
                                $data_q3[$row['q3']]++;
                            }
                        }
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Data dari PHP
        var dataQ1 = <?php echo json_encode(array_values($data_q1)); ?>;
        var dataQ2 = <?php echo json_encode(array_values($data_q2)); ?>;
        var dataQ3 = <?php echo json_encode(array_values($data_q3)); ?>;

        // Konfigurasi chart
        var chartData1 = {
            labels: ["Positif", "Negatif", "Netral"],
            datasets: [{
                label: 'Dampak Teknologi terhadap Lingkungan',
                data: dataQ1,
                backgroundColor: ['#00ADB5', '#393E46', '#EEEEEE'],
                borderColor: ['#00ADB5', '#393E46', '#EEEEEE'],
                borderWidth: 1
            }]
        };

        var chartData2 = {
            labels: ["Sangat Besar", "Besar", "Kecil", "Tidak Terlalu Mempengaruhi"],
            datasets: [{
                label: 'Pengaruh Teknologi terhadap Gaya Hidup',
                data: dataQ2,
                backgroundColor: ['#00ADB5', '#393E46', '#EEEEEE', '#222831'],
                borderColor: ['#00ADB5', '#393E46', '#EEEEEE', '#222831'],
                borderWidth: 1
            }]
        };

        var chartData3 = {
            labels: ["Ya, Berperan", "Tidak, Tidak Berperan", "Sebagian Berperan"],
            datasets: [{
                label: 'Peran Teknologi dalam Masalah Lingkungan',
                data: dataQ3,
                backgroundColor: ['#00ADB5', '#393E46', '#EEEEEE'],
                borderColor: ['#00ADB5', '#393E46', '#EEEEEE'],
                borderWidth: 1
            }]
        };

        // Opsi konfigurasi umum
        var chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: '#EEEEEE'
                    }
                }
            }
        };

        // Inisialisasi chart 1
        var ctx1 = document.getElementById('chart1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: chartData1,
            options: chartOptions
        });

        // Inisialisasi chart 2
        var ctx2 = document.getElementById('chart2').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: chartData2,
            options: chartOptions
        });

        // Inisialisasi chart 3
        var ctx3 = document.getElementById('chart3').getContext('2d');
        new Chart(ctx3, {
            type: 'doughnut',
            data: chartData3,
            options: chartOptions
        });

    </script>

</body>
</html>
