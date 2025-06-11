<?php
require_once 'Users.php';

$user = new Users;

/**
// mengambil user dari database
// $user->get_from_id(4);
$user->get_from_username('esti');
$user->city = "Singaraja";
$user->save();
*/

echo $user->get_total();

echo "\n\n";

