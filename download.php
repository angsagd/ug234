<?php
require_once 'functions.php';
cek_session();

chdir('files');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Storage</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Online Storage</h1>
  </header>
  <?= show_menu() ?>
  <main>
    <?= flash_message() ?>
    <section id="file-upload">
      <h2>Upload</h2>
      <form action="upload.php" enctype="multipart/form-data" method="post">
        <input type="file" name="file" required>
        <button type="submit">Upload</button>
      </form>
    </section>
    <hr>
    <section id="file-download">
      <h2>Download</h2>
      <ul id="file-list">
<?php
$files = scandir(getcwd());
foreach ($files as $file) {

  if(is_file($file) && substr($file, 0, 1)!='.') {
    $size = filesize($file);

    if($size > pow(1024, 3)) $size = round($size/pow(1024, 3), 1) . ' GB';
    elseif($size > pow(1024, 2)) $size = round($size/pow(1024, 2), 1) . ' MB';
    elseif($size > 1024) $size = round($size/1024, 1) . ' KB';
    else $size = $size . ' B';

    echo '<li>';
    echo '<a href="files/'.$file.'" class="dl-filename" download>'.$file.'</a>';
    echo '<span class="dl-filesize">- '.$size.'</span>';
    echo '<a href="delete_file.php?f='.$file.'" class="dl-delete" onclick="return konfirmasi()">delete</a>';
    echo '</li>';
  }
}
?>
      </ul>
    </section>
  </main>
  <script>
    function konfirmasi() {
      return confirm('Apakah anda yakin ingin menghapus file ini?');
    }
  </script>
</body>
</html>