<?php

require_once('../include/dbconfig.php');
require_once('rules/post_rules.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($requests['delete'])){
        $id = $requests['delete'];
        
        if(deleteQuery($id, 'posts')){
            closeConn();

            echo    "<script>
                        alert('Deleted Successfully!');
                        window.location.href = '". ($requests['redirect']??'/') ."'
                    </script>";
            exit;
        }
        echo    "<script>
                    alert('Something went wrong!');
                    window.location.href = '". ($requests['redirect']??'/') ."'
                </script>";
        
    }









    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules);
    if(count($data['errors'])){
        closeConn();

        echo    "<script>
                    alert('". ($data['errors'][0]??'Submission Failed!') ."');
                    window.location.href = '/post'
                </script>";
        exit;
    }
    unset($data['errors']);
    
    try{
        if($query = insertQuery($data, 'posts')){
            closeConn();

            if($requests['captcha-input']){
                generateToken($requests['captcha-input'], '_captcha', 60);
            }
            
            echo    "<script>
                        alert('Submitted Successfully!');
                        window.location.href = '/post'
                    </script>";

            exit;
        }
    
        closeConn();
        
        echo    "<script>
                    alert('Error Submitting Request!');
                    window.location.href = '/post'
                </script>";
    }
    catch(Exception $e){
        logInfo($e);
        closeConn();
        
        echo    "<script>
                    alert('Error Submitting Request!');
                    window.location.href = '/post'
                </script>";
    }
}

header('Location: /post');
 
?>