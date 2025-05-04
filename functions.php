<?php
require_once 'config.php';

// matikan error reporting
mysqli_report(MYSQLI_REPORT_OFF);

// koneksi ke database
if(!$mysqli = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME)) {
  if(MODE == 'development') {
    // jika mode development
    exit('Gagal Koneksi: ' . mysqli_connect_error());
  } else {
    // show http 500 error
    http_response_code(500);
    // simpan error di log file
    exit();
  }
}

function dbquery($sql) {
  global $mysqli;
  // eksekusi query
  if(!$result = mysqli_query($mysqli, $sql)) {
    if(MODE == 'development') {
      // jika mode development
      exit('Gagal Query: ' . mysqli_error($mysqli));
    } else {
      // show http 500 error
      http_response_code(500);
      // simpan error di log file
      exit();
    }
  }

  // kembalikan nilai hasil query
  return $result;
}

function show_menu() {
  $menu ='<nav><ul>';
  // loop menu
  foreach(MENU as $item) 
    $menu .= '<li><a href="' . $item['url'] . '">' . $item['label'] . '</a></li>';
  
  $menu .= '</ul></nav>';
  return $menu;
}

function cek_session() {
  if(!isset($_SESSION['user'])) {
    redirect_with_message('login.php', 'Silahkan login terlebih dahulu', 'error');
  }
}

function redirect_with_message($url, $message, $type = 'success') {
  $_SESSION['flash']['message'] = $message;
  $_SESSION['flash']['type'] = $type;
  header('Location: ' . $url);
  exit();
}

function flash_message() {
  $alert = '';
  if(isset($_SESSION['flash'])) {
    $message = $_SESSION['flash']['message'];
    $type = $_SESSION['flash']['type'];
    unset($_SESSION['flash']);
    $alert .= '<div class="alert alert-' . $type . '">' . $message . '</div>';
  }
  return $alert;
}