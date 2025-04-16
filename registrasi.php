<?php
require_once 'functions.php';

?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Registrasi Anggota</h1>
  </header>
  <?= show_menu() ?>
  <main>
    <form action="simpan_member.php" method="post" id="form-registrasi">
      <fieldset>
        <legend>Informasi Login</legend>
        <div class="row">
          <label for="input-username">Username</label>
          <input type="text" name="username" id="input-username" required autofocus>
        </div>
        <div class="row">
          <label for="input-password">Password</label>
          <input type="password" name="password" id="input-password" required>
        </div>
        <div class="row">
          <label for="input-konfirmasi">Konfirmasi</label>
          <input type="password" name="konfirmasi" id="input-konfirmasi" required>
        </div>
      </fieldset>
      <fieldset>
        <legend>Informasi Pribadi</legend>
        <div class="row">
          <label for="input-fullname">Nama</label>
          <input type="text" name="fullname" id="input-fullname" required>
        </div>
        <div class="row">
          <label for="input-city">Kota</label>
          <input type="text" name="city" id="input-city" required>
        </div>
      </fieldset>
      <fieldset>
        <legend>Aksi</legend>
        <div class="row">
          <button type="reset">Reset</button>
          <button type="submit">Simpan</button>
        </div>
      </fieldset>
    </form>
  </main>
</body>
</html>