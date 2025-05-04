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
  redirect_with_message('daftar_member.php', 'Data tidak ditemukan', 'error');
}
?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Edit Data Anggota</h1>
  </header>
  <?= show_menu() ?>
  <main>
    <form action="update_member.php" method="post" id="form-registrasi">
      <fieldset>
        <legend>Informasi Login</legend>
        <div class="row">
          <label for="input-username">Username</label>
          <input type="text" id="input-username" value="<?= $row['username'] ?>" readonly>
        </div>
      </fieldset>
      <fieldset>
        <legend>Informasi Pribadi</legend>
        <div class="row">
          <label for="input-fullname">Nama</label>
          <input type="text" name="fullname" id="input-fullname" value="<?= $row['fullname'] ?>" required autofocus>
        </div>
        <div class="row">
          <label for="input-city">Kota</label>
          <input type="text" name="city" id="input-city" value="<?= $row['city'] ?>" required>
        </div>
      </fieldset>
      <fieldset>
        <legend>Aksi</legend>
        <div class="row">
          <button type="reset">Reset</button>
          <button type="submit">Simpan</button>
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
        </div>
      </fieldset>
    </form>
  </main>
</body>
</html>