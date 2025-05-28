<?php
require_once 'functions.php';
cek_session();

if(isset($_POST)) {
  $id = $_POST['id'];
  $username = $_POST['username'];
  $fullname = $_POST['fullname'];
  $city = $_POST['city'];

  // validasi password dan konfirmasi
  // dilakukan di sini (setelah pembahasan session)

  // cek apakah ada file gambar yang diupload
  if(isset($_FILES['pic'])) {
    $pic = $_FILES['pic'];
    move_uploaded_file($pic['tmp_name'], 'img/pic/' . $username . '.png');
  }

  // password diubah menjadi hash
  $password = password_hash($password, PASSWORD_DEFAULT);

  $result = dbquery("UPDATE users SET fullname='$fullname', city='$city' WHERE id='$id'");

  if($result) {
    // jika berhasil, redirect ke halaman daftar anggota
    redirect_with_message('daftar_member.php', 'Data anggota "<b>'. $fullname .'</b>" berhasil diperbarui');
  } else {
    // jika gagal, redirect ke halaman daftar anggota
    redirect_with_message('daftar_member.php', 'Gagal memperbarui data anggota', 'error');
  }

}

// redirect ke halaman daftar anggota
// header('Location: daftar_member.php');
// exit();
