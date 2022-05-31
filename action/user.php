<?php

require_once('../include/dbconfig.php');

$requests = $_POST;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($requests['delete']) && $requests['delete']){
        $id = clean_input($requests['delete']);
        
        if(deleteQuery($id, 'users')){
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

    if(isset($requests['approve']) && $requests['approve']){
        $id = clean_input($requests['approve']);
        $column = clean_input($requests['column']);
        $value = clean_input($requests['value']);

        if(toggleStateQuery($id, 'users', $column, $value)){
            closeConn();

            echo    "<script>
                        alert('Updated Successfully!');
                        window.location.href = '". ($requests['redirect']??'/') ."'
                    </script>";
            exit;
        }
        
        echo    "<script>
                    alert('Something went wrong!');
                    window.location.href = '". ($requests['redirect']??'/') ."'
                </script>";
        
    }
}