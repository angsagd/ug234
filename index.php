<?php
require_once 'functions.php';
cek_session();
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas UG234</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <h1>Kelas UG234</h1>
  </header>
  <?= show_menu() ?>
  <main>
    <section>
      <h2>Selamat datang, <?= $_SESSION['user']['fullname'] ?></h2>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati veniam amet cupiditate soluta incidunt? Pariatur vero adipisci eius temporibus perferendis veritatis, delectus odit neque harum dicta eligendi in ex esse ducimus, ad sunt quibusdam. Ad dolorem perferendis illum. Voluptate a dolorum nostrum sed adipisci iste sequi tempora corrupti beatae maxime qui dolor aperiam natus voluptatum, obcaecati sint ullam quidem assumenda.</p>
    </section>
  </main>
</body>
</html>