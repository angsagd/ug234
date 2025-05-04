<?php
require_once 'functions.php';
cek_session();

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

  if($result) {
    // jika berhasil, redirect ke halaman daftar anggota
    redirect_with_message('daftar_member.php', 'Data anggota berhasil ditambahkan');
  } else {
    // jika gagal, redirect ke halaman daftar anggota
    redirect_with_message('daftar_member.php', 'Gagal menambahkan data anggota', 'error');
  }
}

// redirect ke halaman daftar anggota
header('Location: daftar_member.php');
exit();
