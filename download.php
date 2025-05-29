<?php
require_once 'functions.php';
cek_session();
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
        <li>
          <a href="#" class="dl-filename">Lorem Ipsum</a>
          <span class="dl-filesize">- 1.2 MB</span>
          <a href="delete_file.php" class="dl-delete">delete</a>
        </li>
        <li>
          <a href="#" class="dl-filename">Sit Amet</a>
          <span class="dl-filesize">- 1.2 MB</span>
          <a href="delete_file.php" class="dl-delete">delete</a>
        </li>
        <li>
          <a href="#" class="dl-filename">Consectetur adipisicing elit Illum alias sapiente</a>
          <span class="dl-filesize">- 1.2 MB</span>
          <a href="delete_file.php" class="dl-delete">delete</a>
        </li>
        <li>
          <a href="#" class="dl-filename">Sit Amet</a>
          <span class="dl-filesize">- 1.2 MB</span>
          <a href="delete_file.php" class="dl-delete">delete</a>
        </li>
      </ul>
    </section>
  </main>
  
</body>
</html>