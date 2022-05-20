<?php
require_once('log.php');

$servername = "localhost";
$username = "root";
$password = "";
$database = "bookmark";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
date_default_timezone_set('Asia/Singapore');

// Check connection
if ($conn->connect_error) {
  logInfo("Database connection failed".' - '.date("F j, Y, g:i a").PHP_EOL);
  die("Connection failed: " . $conn->connect_error);
}

function closeConn(){
  global $conn;
  $conn->close();
}

?>