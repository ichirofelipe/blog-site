<?php

require_once('base/db_config.php');
require_once('base/jwt_utils.php');

header("Access-Control-Allow-Origin: *");

$user = null;
$captcha = null;
$admin = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    /*=====================*\
            USER AUTH
    \*=====================*/
    if(isset($_COOKIE['_token']) && is_jwt_valid($_COOKIE['_token'])){
        $payload = base64_decode(explode('.', $_COOKIE['_token'])[1]);
        if($id = json_decode($payload)->id){
            $user = findQuery($id, 'users');
            if(isset($user['is_admin_approved']) && $user['is_admin_approved'])
                $captcha = 1;
        }
    }
    else if(isset($_COOKIE['_token'])){
        unset($_COOKIE['_token']);
        setcookie('_token', null, -1, '/');

        $_SESSION['alert'] = [
            'status'    => '201',
            'msg'       => 'Loggin expired! Please login again.',
        ];
    }




    /*=====================*\
            ADMIN AUTH
    \*=====================*/
    if(isset($_COOKIE['_admin']) && is_jwt_valid($_COOKIE['_admin'])){
        $payload = base64_decode(explode('.', $_COOKIE['_admin'])[1]);
        if($id = json_decode($payload)->id){
            $admin = findQuery($id, 'admin');
        }
    }
    else if(isset($_COOKIE['_admin'])){
        unset($_COOKIE['_admin']);
        setcookie('_admin', null, -1, '/');

        $_SESSION['alert'] = [
            'status'    => '201',
            'msg'       => 'Loggin expired! Please login again.',
        ];
    }




    /*=====================*\
            CAPTCHA
    \*=====================*/
    if(isset($_COOKIE['_captcha']) && is_jwt_valid($_COOKIE['_captcha'])){
        $payload = base64_decode(explode('.', $_COOKIE['_captcha'])[1]);
        $captcha = json_decode($payload)->id;
    }
    else if(isset($_COOKIE['_captcha'])){
        unset($_COOKIE['_captcha']);
        setcookie('_captcha', null, -1, '/');
    }
}

?>