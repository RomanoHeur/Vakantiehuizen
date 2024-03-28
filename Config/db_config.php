<?php
$servername = "localhost";
$username = "root";
$password = "Admin";
$dbname = "vakantiehuizen";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo '<script>';
  echo 'console.log("Connected successfully")';
  echo '</script>';
} catch(PDOException $e) {
  echo '<script>';
  echo 'console.log("Connection failed: ")' . $e->getMessage();
  echo '</script>';
}
?>