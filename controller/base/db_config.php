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

session_start();

function closeConn(){
  global $conn;
  $conn->close();
}

function insertQuery($data, $table, $getLastId = false){
  global $conn;
  $sql['columns'] = $sql['values'] = [];

  foreach($data as $column => $value){
    array_push($sql['columns'], $column);
    array_push($sql['values'], "'".$value."'");
  }
  $query = "INSERT INTO $table (".implode(',',$sql['columns']).")
  VALUES (".implode(',',$sql['values']).")";
  
  $result = $conn->query($query);
  if($result && $getLastId)
    return $conn->insert_id;

  return $result;
}

function userVerificationQuery($data, $getLastId = false, $table = 'users'){
  global $conn;

  $query = "SELECT * FROM $table WHERE username = '".$data['username']."'";
  $result = $conn->query($query);
  if($user = $result->fetch_assoc()){
    $verify = password_verify($data['password'], $user['password']);

    if($getLastId && $verify)
      return $user['id'];
    return $verify;
  }
}

function userExistsQuery($user, $table = 'users'){
  global $conn;
  $query = "SELECT * FROM $table WHERE username = '".$user."'";
  $result = $conn->query($query);
  
  return $result->fetch_assoc();
}

function findQuery($id, $table){
  global $conn;
  
  $query = "SELECT * FROM $table WHERE id =".$id;
  $result = $conn->query($query);

  return $result->fetch_assoc();
}

function selectQuery($table, $skip = null, $limit = 0){
  global $conn;

  $query = "SELECT * FROM $table ORDER BY id DESC LIMIT ".($skip?$skip.',':'')."".$limit;
  
  $result = $conn->query($query);

  return $result->fetch_all(MYSQLI_ASSOC);
}

function countQuery($table){
  global $conn;

  $query = "SELECT COUNT(*) as count FROM $table";
  
  $result = $conn->query($query);
  
  return $result->fetch_assoc();
}

?>