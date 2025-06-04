<?php
require_once 'functions.php';
cek_session();

chdir('notes');
$files = scandir(getcwd());

$name = '';
$content = '';
if(isset($_GET['f'])) {
  $name = $_GET['f'];
  $content = file_get_contents($name . '.txt');
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catatan Online</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      display: flex;
      flex-direction: column;
    }
  </style>
</head>
<body>
  <header>
    <h1>Catatan Online</h1>
  </header>
  <?= show_menu() ?>
  <main>
    <?= flash_message() ?>
    <form action="notes_save.php" method="post" id="notes-form">
      <div class="notes-main">
        <div class="notes-list">
          <ul>
<?php
foreach($files as $file) {
  if(is_file($file) && substr($file, 0, 1)!='.' && substr($file, -4)==".txt") {
    $title = substr($file, 0, -4);
    echo '<li';
    if($title == $name) echo ' class="active"';
    echo '><a href="?f='.$title.'">' . $title . '</a></li>';
  }
}
?>
          </ul>
        </div>
        <div class="notes-content">
          <textarea name="content" autofocus spellcheck="false"><?= $content ?></textarea>
        </div>
      </div>
      <div class="notes-action">
        <span>
          <button type="reset">Reset</button>
          <a href="notes_delete.php?f=<?= $name ?>" onclick="return konfirmasi()" class="button">Delete</a>
          <a href="notes.php" class="button">Baru</a>
        </span>
        <span>
          <label for="input-name">Notes Name</label>
          <input type="text" id="input-name" name="name" value="<?= $name ?>" required>
          <button type="submit">Simpan</button>
        </span>
      </div>
    </form>
  </main>
  <script>
    function konfirmasi() {
      return confirm('Apakah Anda yakin ingin menghapus catatan ini?');
    }
  </script>
</body>
</html>