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
            exit;
        }
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Something went wrong!',
        ];
        header('Location: '.$requests['redirect']??'/');
        
    }

    if(isset($requests['approve'])){
        $id = $requests['approve'];
        $column = $requests['column'];
        $value = $requests['value'];
        if(toggleStateQuery($id, 'users', $column, $value)){
            $_SESSION['alert'] = [
                'status'    => '201',
                'msg'       => 'Updated Successfully!',
            ];
            header('Location: '.$requests['redirect']??'/');
            exit;
        }
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Something went wrong!',
        ];
        header('Location: '.$requests['redirect']??'/');
        
    }
}