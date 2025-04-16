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
