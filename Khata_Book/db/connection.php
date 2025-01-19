<?php
function connection()
{
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "khata_book";
  $conn = mysqli_connect($hostname, $username, $password, $database);
  if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $conn;
}
