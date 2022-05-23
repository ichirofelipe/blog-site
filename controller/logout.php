<?php


$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_COOKIE['_token'])) {
        unset($_COOKIE['_token']); 
        setcookie('_token', null, -1, '/'); 
        header('Location: '.$requests['redirect']);
    }
    header('Location: /');
}

?>