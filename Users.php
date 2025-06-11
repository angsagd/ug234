<?php
require_once 'config.php';

class Users
{
  public $fullname;
  public $city;

  private $id;
  private $username;
  private $password;
  private $created_at;
  private $conn;

  public function __construct()
  {
    $this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
  }

  public function password($plain='')
  {
    if($plain!=='') $this->password = password_hash($plain, PASSWORD_DEFAULT);
    return $this->password;
  }

  public function username($username='')
  {
    if($username!=='' && !$this->username) $this->username = $username;
    return $this->username;
  }

  public function get_from_id($id) {
    $result = $this->conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_object();
    $this->id = $id;
    $this->username = $user->username;
    $this->password = $user->password;
    $this->fullname = $user->fullname;
    $this->city = $user->city;
    $this->created_at = $user->created_at;
  }

  public function get_from_username($username) {
    $result = $this->conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_object();
    $this->id = $user->id;
    $this->username = $username;
    $this->password = $user->password;
    $this->fullname = $user->fullname;
    $this->city = $user->city;
    $this->created_at = $user->created_at;
  }

  public function get_all()
  {
    $users = [];
    $result = $this->conn->query("SELECT * FROM users");
    while($user = $result->fetch_object()) {
      $users[] = $user;
    }
    return $users;
  }

  public function get_total()
  {
    $users = $this->get_all();
    return count($users);
  }

  public function save()
  {
    if($this->id) {
      // update
      $sql = "UPDATE users SET fullname='" . $this->fullname . "', city='" . $this->city . "' WHERE id=" . $this->id;
    } else {
      // insert
      $sql = "INSERT INTO users (username, fullname, password, city) VALUES ('" .
             $this->username . "', '" .
             $this->fullname . "', '" .
             $this->password . "', '" .
             $this->city . "')";
    }

    return $this->conn->query($sql);
  }

}
