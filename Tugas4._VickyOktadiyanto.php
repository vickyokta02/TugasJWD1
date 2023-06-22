<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
</head>
<body><body class="container">
  <br><br>
  <h3 class="text-center">MENAMPILKAN BINTANG SESUAI NILAI INPUT</h3>
  <hr>
  <br>
  <!-- Form Input -->
  <form method="POST" action="Tugas4._VickyOktadiyanto.php">
    <label for="title" class="form-label">Masukan Nilai</label><br>
    <input type="text" name="nilai"><br>
    <input type="submit" value="Submit">
  </form>
  <hr>
<?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil nilai dari form
  $nilai = $_POST['nilai'];
} else {
  $nilai = 0;
}

// Fungsi tampil bintang
function tampilkanBintang($nilai)
{
  for ($i = 1; $i <= $nilai; $i++) {
    for ($j = 1; $j <= $i; $j++) {
      echo "*";
    }
    echo "<br>";
  }
}

?>

<br><br>
<h3 class="text-center">Hasillnya</h3>
<div class="btn btn-primary mb-2 col-12">
  <!-- Menampilkan Hasil -->
  <h1>
    <?= tampilkanBintang($nilai) ?>
  </h1>
</div>

</body>

</html>
