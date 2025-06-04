<?php
require_once 'functions.php';
cek_session();

chdir('notes');
if(isset($_POST['name']) && isset($_POST['content'])) {
    $name = $_POST['name'];
    $content = $_POST['content'];
    
    file_put_contents($name . '.txt', $content);
    redirect_with_message('notes.php?f=' . $name, 'Catatan berhasil disimpan!');
}

header('Location: notes.php');
exit();
