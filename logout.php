<?php
require_once 'functions.php';

unset($_SESSION['user']);

header('Location: login.php');
exit();