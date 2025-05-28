<?php
require_once 'functions.php';
cek_session();

if(!isset($_GET['id'])) {
  header('Location: daftar_member.php');
  exit();
}
$id = $_GET['id'];

$result = dbquery("SELECT * FROM users WHERE id = $id");

// ambil data anggota
if(!$row = mysqli_fetch_assoc($result)) {
  // jika tidak ada data anggota, redirect ke daftar anggota
  header('Location: daftar_member.php');
  exit();
}

$pic_path = 'img/blank-profile.png'; // default profile picture path
// cek file gambar username.png di img/pic
if(file_exists('img/pic/' . $row['username'] . '.png')) {
  // jika ada, ganti default profile picture
  $pic_path = 'img/pic/' . $row['username'] . '.png';
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
  <?= show_menu() ?>
  <main>
    <section class="profile-picture">
      <img src="<?= $pic_path ?>" alt="profile picture">
    </section>
    <section>
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
    </section>

  </main>
  <script>
    function konfirmasi_hapus() {
      return confirm('Apakah Anda yakin ingin menghapus anggota ini?');
    }
  </script>
</body>
</html>