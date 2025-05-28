<?php
require_once 'functions.php';
cek_session();

$id = $_SESSION['user']['id'];
header('location: profil_member.php?id=' . $id);
exit();