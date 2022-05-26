<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['alert'] = [
        'status'    => '201',
        'msg'       => 'Logged out successfully!',
    ];

    if(isset($_POST['user'])){
        if (isset($_COOKIE['_token'])) {
            unset($_COOKIE['_token']); 
            setcookie('_token', null, -1, '/');
        }
        header('Location: /');
    }
    else{
        if (isset($_COOKIE['_admin'])) {
            unset($_COOKIE['_admin']); 
            setcookie('_admin', null, -1, '/');
        }
        header('Location: /admin');
    }
}

?>