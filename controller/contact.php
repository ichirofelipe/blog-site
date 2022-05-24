<?php

require_once('base/db_config.php');
require_once('helper/validation.php');
require_once('rules/contact_rules.php');

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
        echo json_encode(array('code' => '400', 'message' => 'Submission Failed   !', 'errors' => $data['errors']));
        header('Location: /contact');
        exit;
    }
    unset($data['errors']);
    
    try{
        if($query = insertQuery($data, 'contacts')){

            closeConn();
            echo json_encode(array('code' => '201', 'message' => 'Submitted Successfully!'));
            header('Location: /contact');
        }
    
        closeConn();
        echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        header('Location: /contact');
    }
    catch(Exception $e){
        dd($e);
        logInfo($e);
        closeConn();
        echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
        header('Location: /contact');
    }
}

header('Location: /contact');
 
?>