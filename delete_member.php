<?php
require_once 'functions.php';
cek_session();

if(!isset($_GET['id'])) {
  header('Location: daftar_member.php');
  exit();
}
$id = $_GET['id'];

$result = dbquery("DELETE FROM users WHERE id = $id");

if($result) {
  // jika berhasil, redirect ke halaman daftar anggota
  redirect_with_message('daftar_member.php', 'Data anggota berhasil dihapus');
} else {
  // jika gagal, redirect ke halaman daftar anggota
  redirect_with_message('daftar_member.php', 'Gagal menghapus data anggota', 'error');
}
