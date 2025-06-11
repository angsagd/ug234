<?php
// php struktural
// menampilkan tabel user

// koneksi
// $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'ug234');
$conn = new mysqli('localhost', 'webuser', 'webuser', 'ug234');

// $result = mysqli_query($conn, "SELECT * FROM users");
$result = $conn->query("SELECT * FROM users");

// while($row = mysqli_fetch_assoc($result)) {
while($row = $result->fetch_object()) {
  // echo $row['fullname'] . "\n";
  echo $row->fullname . "\n";
}

