<?php

require_once('base/db_config.php');
require_once('helper/validation.php');
require_once('rules/post_rules.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($requests['delete'])){
        $id = $requests['delete'];
        
        if(deleteQuery($id, 'posts')){
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









    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules);
    if(count($data['errors'])){
        closeConn();
        dd($data['errors']);

        // echo json_encode(array('code' => '400', 'message' => 'Submission Failed!', 'errors' => $data['errors']));
        $_SESSION['alert'] = [
            'status'    => '400',
            'msg'       => $data['errors'][0]??'Submission Failed!',
        ];
        header('Location: /post');
        exit;
    }
    unset($data['errors']);
    
    try{
        if($query = insertQuery($data, 'posts')){
            
            if($requests['captcha-input']){
                generateToken($requests['captcha-input'], '_captcha', 60);
            }
            
            closeConn();
            // echo json_encode(array('code' => '201', 'message' => 'Submitted Successfully!'));
            $_SESSION['alert'] = [
                'status'    => '201',
                'msg'       => 'Submitted Successfully!',
            ];

            header('Location: /post');
        }
    
        closeConn();
        // echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Error Creating Request!',
        ];

        header('Location: /post');
    }
    catch(Exception $e){
        logInfo($e);
        closeConn();
        // echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        $_SESSION['alert'] = [
            'status'    => '500',
            'msg'       => 'Error Creating Request!',
        ];

        header('Location: /post');
    }
}

header('Location: /post');
 
?>