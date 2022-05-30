<?php
require_once('functions.php');

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

function insertQuery($data, $table, $getLastId = false){
  global $conn;
  $sql['columns'] = $sql['values'] = [];
  $timestamp = time();
  $datetime = date('Y-m-d H:i:s', $timestamp);

  foreach($data as $column => $value){
    array_push($sql['columns'], $column);
    array_push($sql['values'], "'".$value."'");
  }
  $query = "INSERT INTO $table (".implode(',',$sql['columns']).",created_at,updated_at)
  VALUES (".implode(',',$sql['values']).",'".$datetime."','".$datetime."')";
  
  $result = $conn->query($query);
  if($result && $getLastId)
    return $conn->insert_id;

  return $result;
}

function insertMultipleQuery($table, $columns, $values){
  global $conn;
  $timestamp = time();
  $datetime = date('Y-m-d H:i:s', $timestamp);

  $query = "INSERT INTO $table (".implode(',',$columns).",created_at,updated_at) VALUES ";
  foreach($values as $key => $val){
    $query.="(".implode(',',$val).",'".$datetime."','".$datetime."')";
    if($key+1 == count($values)){
      $query.=";";
      continue;
    }
    $query.=",";
  }
  
  $result = $conn->query($query);
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

function selectQuery($table, $skip = null, $limit = 0, $toSelect = '*'){
  global $conn;

  $query = "SELECT $toSelect FROM $table ORDER BY id DESC LIMIT ".($skip?$skip.',':'')."".$limit;
  
  $result = $conn->query($query);

  return $result->fetch_all(MYSQLI_ASSOC);
}

function countQuery($table){
  global $conn;

  $query = "SELECT COUNT(*) as count FROM $table";
  
  $result = $conn->query($query);
  
  return $result->fetch_assoc();
}

function deleteQuery($id, $table){
  global $conn;

  $query = "DELETE FROM $table WHERE id = ".$id;

  $result = $conn->query($query);

  return $result;
}

function toggleStateQuery($id, $table, $column, $value){
  global $conn;
  $timestamp = time();
  $datetime = date('Y-m-d H:i:s', $timestamp);

  $query = "UPDATE ".$table."
  SET ".$column." = ".(1 - $value).", updated_at = '". $datetime ."'
  WHERE id = ".$id;

  $result = $conn->query($query);

  return $result;
}

?>