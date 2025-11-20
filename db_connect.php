<?php
$servername = "localhost";
$username = "root"; // Change if using Hostinger
$password = "";     // Your DB password
$dbname = "noidawale_manpower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}
?>
