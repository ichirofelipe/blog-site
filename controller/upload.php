<?php

require_once('base/db_config.php');
require_once('helper/validation.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($requests['upload'])){
        $table = $requests['upload'];
        $file = $_FILES['file'];
        $filename = $file['tmp_name'];
        $columns = [];
        $values = [];

        if($file["size"] < 1){
            $_SESSION['alert'] = [
                'status'    => '400',
                'msg'       => 'Upload Failed!',
            ];
            
            header('Location: /admin/'.$table);
            exit;
        }

        $newFile = fopen($filename, "r");
        $flag = true;
        while (($data = fgetcsv($newFile)) !== FALSE) {
            //GET COLUMNS
            if($flag) {
                foreach($data as $cols){
                    array_push($columns, $cols);
                }
                $flag = false;
                continue; 
            }
            //GET VALUES
            $tmp_values = [];
            foreach($data as $val){
                array_push($tmp_values, "'".$val."'");
            }
            array_push($values, $tmp_values);
        }
        
        
        try{
            if($query = insertMultipleQuery('posts', $columns, $values)){
                
                closeConn();
                // echo json_encode(array('code' => '201', 'message' => 'Submitted Successfully!'));
                $_SESSION['alert'] = [
                    'status'    => '201',
                    'msg'       => 'Uploaded Successfully!',
                ];
                
                header('Location: /admin/'.$table);
            }
        
            closeConn();
            // echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
            $_SESSION['alert'] = [
                'status'    => '500',
                'msg'       => 'Error Creating Request!',
            ];
    
            header('Location: /admin/'.$table);
        }
        catch(Exception $e){
            logInfo($e);
            closeConn();
            // echo json_encode(array('code' => '500', 'message' => 'Error Creating Request!'));
            $_SESSION['alert'] = [
                'status'    => '500',
                'msg'       => 'Error Creating Request!',
            ];

            header('Location: /admin/'.$table);
        }
    }
}