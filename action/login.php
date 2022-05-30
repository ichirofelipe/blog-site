<?php

require_once('../include/dbconfig.php');
require_once('rules/login_rules.php');

$requests = $_POST;
$table = isset($requests['users'])?'users':'admin';
$redirect = '/';
if($table == 'admin')
    $redirect = '/admin/posts';
    
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules);

    if(count($data['errors'])){
        closeConn();

        echo    "<script>
                    alert('".($data['errors'][0]??'Login Failed!')."');
                    window.location.href = '".$redirect."'
                </script>";
        exit;
    }
    unset($data['errors']);
    
    try{
        if($query = userVerificationQuery($data, true, $table)){
            closeConn();

            switch($table){
                case 'admin':
                    generateToken($query, '_admin');
                    break;
                default:
                    generateToken($query);
                    if(isset($requests['captcha-input'])){
                        generateToken($requests['captcha-input'], '_captcha', 60);
                    }
                    break;
            }

            echo    "<script>
                        alert('Logged in Successfully!');
                        window.location.href = '".$redirect."'
                    </script>";
            exit;
        }

        closeConn();

        echo    "<script>
                    alert('User and Password does not exist!');
                    window.location.href = '".$redirect."'
                </script>";
        exit;
    }
    catch(Exception $e){
        logInfo($e);
        closeConn();

        echo    "<script>
                    alert('Error Submitting Request!');
                    window.location.href = '".$redirect."'
                </script>";
    }
}

header('Location: '.$redirect);
 
?>