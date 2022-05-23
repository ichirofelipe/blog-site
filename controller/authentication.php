<?php

require_once('base/db_config.php');
require_once('base/jwt_utils.php');

header("Access-Control-Allow-Origin: *");

$user = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_COOKIE['_token']) && is_jwt_valid($_COOKIE['_token'])){
        $payload = base64_decode(explode('.', $_COOKIE['_token'])[1]);
        if($id = json_decode($payload)->id){
            $user = findQuery($id, 'users');
        }
    }
}

?>