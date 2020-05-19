<?php

require_once 'models.php';
$id =  filter($_GET['ubah']);

if (isset($_GET['ubah']) == query("SELECT id FROM data_siswa WHERE id = '$id'")) {

  $ubah = query("SELECT * FROM data_siswa WHERE id = '$id'")[0];
} else {
  header("Location: index.php");
}

if (isset($_POST['ubah'])) {
  if (ubah($_POST, $_GET) > 0) {
    echo "<script>
  alert('Data siswa berhasil di ubah');
      document.location.href = 'index.php';
      </script>";
  } else {
    echo "<script>
  alert('Data siswa gagal di ubah');
      document.location.href = 'index.php';
      </script>";
  }
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

  <title>data siswa</title>
</head>

<body>
  <h1 class="text-center mt-1">Ubah data siswa</h1>

  <a href="index.php" class="btn btn-secondary ml-5">kembali</a>
  <form action="" method="POST">

    <div class="row justify-content-center">
      <div class="col-md-5">

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="nama" id="nama" value="<?= $ubah['nama']; ?>">
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $ubah['alamat']; ?>">
        </div>

        <div class="form-group">
          <label for="kelas">Kelas</label>
          <select class="form-control" name="kelas" id="kelas">
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
          </select>
        </div>

        <div class="form-group">
          <label for="jenis_kelamin">Jenis kelamin</label>
          <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
            <option value="laki - laki">laki - laki</option>
            <option value="perempuan">perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label for="jurusan">Jurusan</label>
          <select class="form-control" name="jurusan" id="jurusan">
            <option value="multi media">multi media</option>
            <option value="teknik komputer dan jaringan">teknik komputer dan jaringan</option>
            <option value="rekayasa perangkat lunak">rekayasa perangkat lunak</option>
            <option value="broadcasting">broadcasting</option>
          </select>
        </div>
        <button type="submit" name="ubah" class="btn btn-primary">Ubah Data</button>
      </div>
    </div>


  </form>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>

  <script>
    $('#jurusan').val('<?php echo $ubah['jurusan']; ?>');
    $('#jenis_kelamin').val('<?php echo $ubah['jenis_kelamin']; ?>');
    $('#kelas').val('<?php echo $ubah['kelas']; ?>');
  </script>
</body>

</html>