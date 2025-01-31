<?php
function connection()
{
  $hostname = "localhost";
  $username = "u510762903_AtV";
  $password = "AtV@tRVbyEv4R^UntyM9";
  $database = "u510762903_AtV";
  $conn = mysqli_connect($hostname, $username, $password, $database);
  if (!$conn) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  return $conn;
}
