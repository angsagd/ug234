<?php
require_once 'functions.php';
cek_session();

if(isset($_POST)) {
  $id = $_POST['id'];
  $fullname = $_POST['fullname'];
  $city = $_POST['city'];

  // validasi password dan konfirmasi
  // dilakukan di sini (setelah pembahasan session)

  // password diubah menjadi hash
  $password = password_hash($password, PASSWORD_DEFAULT);

  $result = dbquery("UPDATE users SET fullname='$fullname', city='$city' WHERE id='$id'");

  if($result) {
    // jika berhasil, redirect ke halaman daftar anggota
    redirect_with_message('daftar_member.php', 'Data anggota berhasil diperbarui');
  } else {
    // jika gagal, redirect ke halaman daftar anggota
    redirect_with_message('daftar_member.php', 'Gagal memperbarui data anggota', 'error');
  }
}

// redirect ke halaman daftar anggota
header('Location: daftar_member.php');
exit();
