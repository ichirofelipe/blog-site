<?php

require_once('base/db_config.php');
require_once('helper/validation.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($requests['delete'])){
        $id = $requests['delete'];
        
        if(deleteQuery($id, 'users')){
            $_SESSION['alert'] = [
                'status'    => '201',
                'msg'       => 'Deleted Successfully!',
            ];
            header('Location: '.$requests['redirect']??'/');
        }
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Something went wrong!',
        ];
        header('Location: '.$requests['redirect']??'/');
        
    }
}