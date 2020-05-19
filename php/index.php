<?php

require_once 'models.php';

$data_siswa = query("SELECT * FROM data_siswa");

if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
  alert('Data siswa berhasil di tambahkan');
  document.location.href = 'index.php';
      </script>";
  } else {
    echo "<script>
    alert('Data siswa gagal di tambahkan');
        </script>";
  }
}

if (isset($_GET['hapus'])) {
  if (hapus($_GET['hapus']) > 0) {
    echo "<script>
  alert('Data siswa berhasil di hapus');
      document.location.href = 'index.php';
      </script>";
  } else {
    echo "<script>
    alert('Data siswa gagal di hapus');
        document.location.href = 'index.php';
        </script>";
  }
}

if (isset($_POST['cari'])) {
  $kata_kunci = filter($_POST['kata_kunci']);
  $data_siswa = query("SELECT * FROM data_siswa WHERE nama LIKE '%$kata_kunci%' OR alamat LIKE '%$kata_kunci%' OR kelas LIKE '%$kata_kunci%' OR jenis_kelamin LIKE '%$kata_kunci%' OR jurusan LIKE '%$kata_kunci%'");
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
  <h1 class="text-center mt-1">Data siswa</h1>
  <button type="button" class="btn btn-primary mt-4 ml-5 mb-3" data-toggle="modal" data-target="#exampleModal">
    Tambah data siswa
  </button>

  <form action="" method="POST">
    <div class="row">
      <div class="col-md-6">
        <div class="input-group mb-3">
          <input type="text" class="form-control ml-5" name="kata_kunci" placeholder="Cari berdasarkan nama, alamat, kelas, jenis kelamin, jurusan" autocomplete="off" autofocus>
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" name="cari" id="button-addon2">Cari..</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1;
      foreach ($data_siswa as $siswa) : ?>
        <tr>
          <th scope="row"><?= $i; ?></th>
          <td><?= $siswa['nama']; ?></td>
          <td><?= $siswa['alamat']; ?></td>
          <td>
            <!-- Button trigger modal -->
            <a href="index.php?hapus=<?= $siswa['id']; ?>" class="badge badge-danger" onclick="return confirm('apakah ingin menghapus data siswa ??');">Hapus</a>
            <a href="detail.php?detail=<?= $siswa['id']; ?>" class="badge badge-info">detail</a>
            <a href="ubah.php?ubah=<?= $siswa['id']; ?>" class="badge badge-primary">Ubah</a>
          </td>
        </tr>
      <?php $i++;
      endforeach; ?>
    </tbody>
  </table>



  <!-- Modal -->
  <form action="" method="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah data siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama">
            </div>

            <div class="form-group">
              <label for="alamat">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="alamat">
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
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="tambah" class="btn btn-primary">Tambah data siswa</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>