<?php
require_once 'functions.php';
cek_session();

$result = dbquery("SELECT * FROM users");

?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Anggota</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Daftar Anggota</h1>
  </header>
  <?= show_menu() ?>
  <main>
    <?= flash_message() ?>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Username</th>
          <th>Nama Lengkap</th>
          <th>Kota Asal</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <!-- start loop -->
<?php
// tampilkan data anggota
$num = 1;
while($row = mysqli_fetch_assoc($result)) {
  echo '<tr>';
  echo '<td>' . $num++ . '</td>';
  echo '<td>' . $row['username'] . '</td>';
  echo '<td>' . $row['fullname'] . '</td>';
  echo '<td>' . $row['city'] . '</td>';
  echo '<td><a href="profil_member.php?id=' . $row['id'] . '">Detail</a></td>';
  echo '</tr>';
}
?>
        <!-- end loop -->
      </tbody>
    </table>
  </main>
  
</body>
</html>