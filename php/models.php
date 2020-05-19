<?php

$database = mysqli_connect("localhost", "root", "", "smk_media_informatika");

function query($data)
{
  global $database;
  $hasil = mysqli_query($database, $data);
  $rows = [];
  while ($row = mysqli_fetch_assoc($hasil)) {

    $rows[] = $row;
  }
  return $rows;
}


function filter($data)
{
  global $database;
  return mysqli_escape_string($database, htmlspecialchars($data));
}


function tambah($data)
{
  global $database;
  $nama = filter($data['nama']);
  $alamat = filter($data['alamat']);
  $kelas = filter($data['kelas']);
  $jenis_kelamin = filter($data['jenis_kelamin']);
  $jurusan = filter($data['jurusan']);

  $query = "INSERT INTO data_siswa VALUES('','$nama', '$alamat','$kelas','$jenis_kelamin','$jurusan')";
  mysqli_query($database, $query);
  return mysqli_affected_rows($database);
}

function hapus($data)
{
  global $database;
  $id = filter($data);
  $query = "DELETE FROM data_siswa WHERE id = $id";
  mysqli_query($database, $query);
  return mysqli_affected_rows($database);
}

function ubah($post, $get)
{
  global $database;
  $nama = filter($post['nama']);
  $alamat = filter($post['alamat']);
  $kelas = filter($post['kelas']);
  $jenis_kelamin = filter($post['jenis_kelamin']);
  $jurusan = filter($post['jurusan']);
  $id = filter($get['ubah']);


  $query = "UPDATE data_siswa SET nama = '$nama', alamat = '$alamat', kelas = '$kelas', jenis_kelamin = '$jenis_kelamin', jurusan = '$jurusan' WHERE id = $id";
  mysqli_query($database, $query);
  return mysqli_affected_rows($database);
}
