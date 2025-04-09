<?php

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

  // koneksi ke database
  $mysqli = mysqli_connect('localhost', 'webuser', 'webuser', 'ug234');
  // buat query
  $sql = "INSERT INTO users (username, password, fullname, city) 
          VALUES ('$username', '$password', '$fullname', '$city')";
  // eksekusi query
  if(!$result = mysqli_query($mysqli, $sql)) {
    // jika gagal, tampilkan pesan error
    exit('Gagal Query: ' . mysqli_error($mysqli));
  }

}

// redirect ke halaman daftar anggota
header('Location: daftar_member.php');
