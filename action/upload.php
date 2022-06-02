<?php

require_once('../include/dbconfig.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($requests['upload']) && $requests['upload']){
        $table = clean_input($requests['upload']);
        $file = $_FILES['file'];
        $filename = $file['tmp_name'];
        $columns = [];
        $values = [];

        if($file["size"] < 1){
            
            echo    "<script>
                        alert('Upload Failed!');
                        window.location.href = '/admin/". $table ."'
                    </script>";
            exit;
        }

        $newFile = fopen($filename, "r");
        $flag = true;
        while (($data = fgetcsv($newFile)) !== FALSE) {
            //GET COLUMNS
            if($flag) {
                foreach($data as $cols){
                    array_push($columns, 'posts_'.$cols);
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
            
                echo    "<script>
                            alert('Uploaded Successfully!');
                            window.location.href = '/admin/". $table ."'
                        </script>";
                exit;
            }
        
            closeConn();
            
            echo    "<script>
                        alert('Error Submitting Request!');
                        window.location.href = '/admin/". $table ."'
                    </script>";
        }
        catch(Exception $e){
            logInfo($e);
            closeConn();
            
            echo    "<script>
                        alert('Error Submitting Request!');
                        window.location.href = '/admin/". $table ."'
                    </script>";
        }
    }
}