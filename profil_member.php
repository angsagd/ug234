<?php
if(!isset($_GET['id'])) {
  header('Location: daftar_member.php');
  exit();
}
$id = $_GET['id'];
// koneksi ke database
$mysqli = mysqli_connect('localhost', 'webuser', 'webuser', 'ug234');
// buat query
$sql = "SELECT * FROM users WHERE id = $id";
// eksekusi query
if(!$result = mysqli_query($mysqli, $sql)) {
  // jika gagal, tampilkan pesan error
  exit('Gagal Query: ' . mysqli_error($mysqli));
}
// ambil data anggota
if(!$row = mysqli_fetch_assoc($result)) {
  // jika tidak ada data anggota, redirect ke daftar anggota
  header('Location: daftar_member.php');
  exit();
}
?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Profil Anggota</h1>
  </header>
  <nav>
    <ul>
      <li><a href="daftar_member.php">Daftar Anggota</a></li>
      <li><a href="registrasi.php">Registrasi Anggota</a></li>
    </ul>
  </nav>
  <main>
    <h2><?= $row['fullname'] ?></h2>
    <h3>&lt;<?= $row['username'] ?>&gt;</h3>
    <p>
      <span class="label-detail">Kota Asal</span>
      <span>:</span>
      <span class="isi-detail"><?= $row['city'] ?></span>
    </p>
    <p>
      <span class="label-detail">Terdaftar Sejak</span>
      <span>:</span>
      <span class="isi-detail"><?= $row['created_at'] ?></span>
    </p>
    <hr>
    <div class="button-container">
      <a href="daftar_member.php">Kembali</a>
      <a href="edit_member.php?id=<?= $row['id'] ?>">Edit</a>
      <a href="hapus_member.php?id=<?= $row['id'] ?>" onclick="return konfirmasi_hapus()">Hapus</a>
    </div>
  </main>
  <script>
    function konfirmasi_hapus() {
      return confirm('Apakah Anda yakin ingin menghapus anggota ini?');
    }
  </script>
</body>
</html>