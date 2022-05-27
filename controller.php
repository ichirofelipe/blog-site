<?php

require_once('controller/authentication.php');

if(isset($_GET['php_code']) && $_GET['php_code']){
    $controller = $_GET['php_code'];
    $dir = "controller/";

    switch($controller){
        case "signup":
            require_once($dir."signup.php");
            break;
        case "logout":
            require_once($dir."logout.php");
            break;
        case "login":
            require_once($dir."login.php");
            break;
        case "post":
            require_once($dir."post.php");
            break;
        case "user":
            require_once($dir."user.php");
            break;
        case "contact":
            require_once($dir."contact.php");
            break;
        case "upload":
            require_once($dir."upload.php");
            break;
    }
    exit;
}

?>