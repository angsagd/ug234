<?php
session_start();

const DBHOST = 'localhost';
const DBUSER = 'webuser';
const DBPASS = 'webuser';
const DBNAME = 'ug234';

const MODE = 'development'; // development | production

const MENU = [
  ['url'=>'index.php', 'label'=>'Beranda'],
  ['url'=>'daftar_member.php', 'label'=>'Daftar Anggota'],
  ['url'=>'registrasi.php', 'label'=>'Registrasi Anggota'],
  ['url'=>'profil.php', 'label'=>'Profil'],  
  ['url'=>'logout.php', 'label'=>'Logout'],
];