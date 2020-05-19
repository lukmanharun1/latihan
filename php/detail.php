<?php

require_once 'models.php';
$id = filter($_GET['detail']);
if (isset($_GET['detail']) == query("SELECT id FROM data_siswa WHERE id = $id")) {

  $detail = query("SELECT * FROM data_siswa WHERE id = $id")[0];
} else {
  header("Location: index.php");
}



?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <title>detail siswa</title>
</head>

<body>
  <h1 class="text-center mt-1">Detail data siswa</h1>

  <a href="index.php" class="btn btn-secondary ml-5 mb-3">kembali</a>
  <div class="row">
    <div class="col-md-6 ml-5 mt-4">
      <div class="card">
        <ul class="list-group list-group-flush">
          <li class="list-group-item"><b>Nama : </b> <?= $detail['nama']; ?></li>
          <li class="list-group-item"><b>Alamat : </b> <?= $detail['alamat']; ?></li>
          <li class="list-group-item"><b>Kelas : </b><?= $detail['kelas']; ?></li>
          <li class="list-group-item"><b>Jenis kelamin : </b><?= $detail['jenis_kelamin']; ?></li>
          <li class="list-group-item"><b>Jurusan : </b><?= $detail['jurusan']; ?></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>