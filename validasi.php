<?php
require_once 'functions.php';

if(isset($_POST)) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = dbquery("SELECT * FROM users WHERE username='$username'");
  if(mysqli_num_rows($result)===1) {
    $user = mysqli_fetch_assoc($result);
    if(password_verify($password, $user['password'])) {
      // simpan session di server
      $_SESSION['user']['id'] = $user['id'];
      $_SESSION['user']['username'] = $user['username'];
      $_SESSION['user']['fullname'] = $user['fullname'];
      // redirect ke halaman index
      header('Location: index.php');
      exit();
    }
  }
}

// redirect ke halaman login
header('Location: login.php');
exit();