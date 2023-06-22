<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Project Ticket Pesawat</title>
    <style>
        body {
            background: url(gambar/bg3.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            width: 400px;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .output-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .output-container p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        @media (max-width: 600px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .form-container,
            .output-container {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Pendaftaran Rute Penerbangan</h2>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="maskapai">Maskapai:</label>
                    <input type="text" id="maskapai" name="Maskapai">
                </div>
                <div class="form-group">
                    <label for="bandaraAsal">Bandara Asal:</label>
                    <select id="bandaraAsal" name="BandaraAsal">
                        <option value="Soekarno-Hatta (CGK)">Soekarno-Hatta (CGK)</option>
                        <option value="Husein Sastranegara (BDO)">Husein Sastranegara (BDO)</option>
                        <option value="Abdul Rachman Saleh (MLG)">Abdul Rachman Saleh (MLG)</option>
                        <option value="Juanda (SUB)">Juanda (SUB)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bandaraTujuan">Bandara Tujuan:</label>
                    <select id="bandaraTujuan" name="BandaraTujuan">
                        <option value="Ngurah Rai (DPS)">Ngurah Rai (DPS)</option>
                        <option value="Hasanuddin (UPG)">Hasanuddin (UPG)</option>
                        <option value="Inanwatan (INX)">Inanwatan (INX)</option>
                        <option value="Sultan Iskandarmuda (BTJ)">Sultan Iskandarmuda (BTJ)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hargaTiket">Harga Tiket:</label>
                    <input type="text" id="hargaTiket" name="HargaTiket">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="output-container">
            <h2>Data Rute Penerbangan</h2>
            <?php
            // Fungsi untuk membuat tabel
            function createTable($data)
            {
                // Mengurutkan data berdasarkan Bandara Asal secara alfabetis
                usort($data, function ($a, $b) {
                    return strcmp($a['BandaraAsal'], $b['BandaraAsal']);
                });

                // Membuat tabel
                echo "<table>";
                echo "<tr>";
                echo "<th>Maskapai</th>";
                echo "<th>Bandara Asal</th>";
                echo "<th>Bandara Tujuan</th>";
                echo "<th>Harga Tiket</th>";
                echo "<th>Total Pajak</th>";
                echo "<th>Total Harga</th>";
                echo "</tr>";

                foreach ($data as $item) {
                    echo "<tr>";
                    echo "<td>" . $item['Maskapai'] . "</td>";
                    echo "<td>" . $item['BandaraAsal'] . "</td>";
                    echo "<td>" . $item['BandaraTujuan'] . "</td>";
                    echo "<td>" . $item['HargaTiket'] . "</td>";
                    echo "<td>" . $item['TotalPajak'] . "</td>";
                    echo "<td>" . $item['TotalHarga'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            }

            if (isset($_POST['submit'])) {
                // Mengambil data dari formulir
                $maskapai = $_POST['Maskapai'];
                $bandaraAsal = $_POST['BandaraAsal'];
                $bandaraTujuan = $_POST['BandaraTujuan'];
                $hargaTiket = $_POST['HargaTiket'];

                // Daftar pajak bandara asal
                $pajakAsalList = [
                    "Soekarno-Hatta (CGK)" => 50000,
                    "Husein Sastranegara (BDO)" => 30000,
                    "Abdul Rachman Saleh (MLG)" => 40000,
                    "Juanda (SUB)" => 40000
                ];

                // Daftar pajak bandara tujuan
                $pajakTujuanList = [
                    "Ngurah Rai (DPS)" => 80000,
                    "Hasanuddin (UPG)" => 70000,
                    "Inanwatan (INX)" => 90000,
                    "Sultan Iskandarmuda (BTJ)" => 70000
                ];

                // Mendapatkan pajak berdasarkan bandara asal dan tujuan
                $pajakAsal = $pajakAsalList[$bandaraAsal];
                $pajakTujuan = $pajakTujuanList[$bandaraTujuan];

                // Menghitung total pajak
                $totalPajak = $pajakAsal + $pajakTujuan;

                // Menghitung total harga dengan pajak
                $totalHarga = $hargaTiket + $totalPajak;

                // Array data baru
                $newData = [
                    "Maskapai" => $maskapai,
                    "BandaraAsal" => $bandaraAsal,
                    "BandaraTujuan" => $bandaraTujuan,
                    "HargaTiket" => $hargaTiket,
                    "TotalPajak" => $totalPajak,
                    "TotalHarga" => $totalHarga
                ];

                // Mengambil data JSON dari file
                $jsonData = file_get_contents('data/data.json');

                // Mengubah JSON menjadi array
                $data = json_decode($jsonData, true);

                // Menambahkan data baru ke array
                $data[] = $newData;

                // Mengubah array menjadi JSON
                $jsonData = json_encode($data);

                // Menyimpan data JSON ke file
                $file = 'data/data.json';
                file_put_contents($file, $jsonData);

                // Menampilkan pesan sukses
                echo "<div class='output-container'>";
                echo "<p class='text-success'>Data berhasil ditambahkan.</p>";
                echo "<p>Maskapai: " . $maskapai . "</p>";
                echo "<p>Bandara Asal: " . $bandaraAsal . "</p>";
                echo "<p>Bandara Tujuan: " . $bandaraTujuan . "</p>";
                echo "<p>Harga Tiket: " . $hargaTiket . "</p>";
                echo "<p>Total Pajak: " . $totalPajak . "</p>";
                echo "<p>Total Harga: " . $totalHarga . "</p>";
                echo "</div>";
            }

            // Mengambil data JSON dari file
            $jsonData = file_get_contents('data/data.json');

            // Mengubah JSON menjadi array
            $data = json_decode($jsonData, true);

            // Menampilkan data dalam tabel
            createTable($data);
            ?>
        </div>
    </div>
</body>

</html>
