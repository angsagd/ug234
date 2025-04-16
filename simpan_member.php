<?php
require_once 'functions.php';

if(isset($_POST)) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $konfirmasi = $_POST['konfirmasi'];
  $fullname = $_POST['fullname'];
  $city = $_POST['city'];

  // validasi password dan konfirmasi
  // dilakukan di sini (setelah pembahasan session)

  // password diubah menjadi hash
  $password = password_hash($password, PASSWORD_DEFAULT);

  $result = dbquery("INSERT INTO users (username, password, fullname, city) 
          VALUES ('$username', '$password', '$fullname', '$city')");

}

// redirect ke halaman daftar anggota
header('Location: daftar_member.php');
