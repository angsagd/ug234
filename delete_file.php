<?php
require_once 'functions.php';
cek_session();

if(isset($_GET['f'])) {
  chdir('files');
  unlink($_GET['f']);
  redirect_with_message('download.php', 'File "'.$_GET['f'].'" berhasil dihapus');
}

header('location: download.php');
exit;