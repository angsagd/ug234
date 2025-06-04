<?php
require_once 'functions.php';
cek_session();

if(isset($_GET['f'])) {
  chdir('notes');
  unlink($_GET['f'].'.txt');
  redirect_with_message('notes.php', 'Catatan "'.$_GET['f'].'" berhasil dihapus');
}

header('location: notes.php');
exit;