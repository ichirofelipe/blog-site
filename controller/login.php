<?php

require_once('base/db_config.php');
require_once('helper/validation.php');
require_once('rules/login_rules.php');

$requests = $_POST;
$table = isset($requests['users'])?'users':'admin';
$redirect = '/';
if($table == 'admin')
    $redirect = '/admin/news';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules);

    if(count($data['errors'])){
        closeConn();
        
        // echo json_encode(array('code' => '400', 'message' => 'Login Failed!', 'errors' => $data['errors']));
        $_SESSION['alert'] = [
            'status'    => '400',
            'msg'       => $data['errors'][0]??'Login Failed!',
        ];

        header('Location: '.$redirect);
        exit;
    }
    unset($data['errors']);
    
    try{
        if($query = userVerificationQuery($data, true, $table)){
            
            switch($table){
                case 'admin':
                    generateToken($query, '_admin');
                    break;
                default:
                    generateToken($query);
                    if($requests['captcha-input']){
                        generateToken($requests['captcha-input'], '_captcha', 60);
                    }
                    break;
            }
            
            closeConn();
            // echo json_encode(array('code' => '201', 'message' => 'Logged in Successfully!'));
            $_SESSION['alert'] = [
                'status'    => '201',
                'msg'       => 'Logged in Successfully!',
            ];
            
            header('Location: '.$redirect);
        }
    
        closeConn();
        // echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Error Creating Request!',
        ];

        header('Location: '.$redirect);
    }
    catch(Exception $e){
        logInfo($e);
        closeConn();
        // echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Error Creating Request!',
        ];

        header('Location: '.$redirect);
    }
}

header('Location: '.$redirect);
 
?>