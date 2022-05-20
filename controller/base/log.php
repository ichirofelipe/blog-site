<?php

function logInfo($log){
    //Write action to txt log
    file_put_contents('../error_logs_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
}

function dd($var){
    var_dump($var);
    die();
}

?>