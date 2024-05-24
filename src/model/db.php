<?php
function connectToBdd()
{
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "blog_afpa_ecf4";
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->exec('SET NAMES UTF8');
  } catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
  }
  return $conn;
}