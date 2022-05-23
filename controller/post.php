<?php

require_once('base/db_config.php');
require_once('helper/validation.php');
require_once('rules/post_rules.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //VALIDATE REQUESTS
    $data = validateRequests($requests, $rules);
    if(count($data['errors'])){
        closeConn();
        dd($data['errors']);
        echo json_encode(array('code' => '400', 'message' => 'Submittion Failed   !', 'errors' => $data['errors']));
        header('Location: /');
        exit;
    }
    unset($data['errors']);
    
    try{
        if($query = insertQuery($data, 'posts')){

            closeConn();
            echo json_encode(array('code' => '201', 'message' => 'Post Submitted Successfully!'));
            header('Location: /');
        }
    
        closeConn();
        echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        header('Location: /');
    }
    catch(Exception $e){
        dd($e);
        logInfo($e);
        closeConn();
        echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        header('Location: /');
    }
}

header('Location: /');
 
?>