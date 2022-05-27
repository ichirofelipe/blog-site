<?php

require_once('base/db_config.php');
require_once('helper/validation.php');


$requests = $_POST;
$table = isset($requests['users'])?'users':'admin';
$redirect = '/';
if($table == 'admin'){
    $redirect = '/admin';
    require_once('rules/admin_signup_rules.php');
}
else{
    require_once('rules/signup_rules.php');
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules, true);
    if(count($data['errors'])){
        closeConn();
        // echo json_encode(array('code' => '400', 'message' => 'Registration Failed!', 'errors' => $data['errors']));
        $_SESSION['alert'] = [
            'status'    => '400',
            'msg'       => $data['errors'][0]??'Registration Failed!',
        ];

        header('Location: '.$redirect);
        exit;
    }
    unset($data['errors']);

    try{
        if($query = insertQuery($data, $table, true)){
            
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
            // echo json_encode(array('code' => '201', 'message' => 'Registered Successfully!'));
            $_SESSION['alert'] = [
                'status'    => '201',
                'msg'       => 'Registered Successfully!',
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