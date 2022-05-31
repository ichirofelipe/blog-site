<?php

require_once('../include/dbconfig.php');
require_once('rules/signup_rules.php');

$requests = $_POST;
$redirect = '/';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules, true);
    if(count($data['errors'])){
        closeConn();

        echo    "<script>
                    alert('". ($data['errors'][0]??'Registration Failed!') ."');
                    window.location.href = '". $redirect ."'
                </script>";
        exit;
    }
    unset($data['errors']);

    try{
        if($query = insertQuery($data, 'users', true)){
            closeConn();
            
            generateToken($query);
            if($requests['captcha-input']){
                generateToken($requests['captcha-input'], '_captcha', 60);
            }

            echo    "<script>
                        alert('Registered Successfully!');
                        window.location.href = '". $redirect ."'
                    </script>";
            
            exit;
        }
    
        closeConn();

        echo    "<script>
                    alert('Error Submitting Request!');
                    window.location.href = '". $redirect ."'
                </script>";
    }
    catch(Exception $e){
        logInfo($e);
        closeConn();
        
        echo    "<script>
                    alert('Error Submitting Request!');
                    window.location.href = '". $redirect ."'
                </script>";
    }
}

header('Location: '.$redirect);
 
?>