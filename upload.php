<?php
require_once 'functions.php';
cek_session();

if(isset($_FILES['file'])) {

  $file = $_FILES['file'];
  chdir('files');

  move_uploaded_file($file['tmp_name'], $file['name']);
  redirect_with_message('download.php', 'File telah berhasil diupload');

}

redirect_with_message('download.php', 'File upload tidak ditemukan', 'error');
