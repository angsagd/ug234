<?php
require_once 'functions.php';
if(isset($_SESSION['user'])) {
  header('Location: index.php');
  exit();
}

?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Login Anggota</h1>
  </header>
  <main>
    <form action="validasi.php" method="post" id="form-login">
      <?= flash_message() ?>
      <div class="row">
        <label for="input-username">Username</label>
        <input type="text" name="username" id="input-username" required autofocus>
      </div>
      <div class="row">
        <label for="input-password">Password</label>
        <input type="password" name="password" id="input-password" required>
      </div>
      <div class="row">
        <button type="submit">Login</button>
      </div>
    </form>
  </main>
</body>
</html>