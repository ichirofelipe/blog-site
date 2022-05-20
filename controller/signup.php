<?php

require_once('base/db_config.php');
require_once('helper/validation.php');
require_once('rules/signup_rules.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //VALIDATE REQUESTS
    $errors = validateRequests($requests, $rules);
    if($errors)
        closeConn();
}

header('Location: '.$requests['redirect']);
 
?>