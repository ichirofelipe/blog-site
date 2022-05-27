<?php
require_once('controller/authentication.php');
require_once('functions.php');

/*=====================*\
          ADMIN
\*=====================*/

if((isset($_GET['admin_code']) && $_GET['admin_code']) || $page == 'admin'){
    $page = $active = $_GET['admin_code']??'';
    $dir = "views/admin/";


    include_once("views/admin/includes/header.php");

    if(isset($_SESSION['alert']) && $_SESSION['alert'] != ''){
        if($admin){
            include_once('views/includes/alert.php');
        }
        else{
            include_once('views/admin/includes/alert.php');
        }
        unset($_SESSION['alert']);
    }

    if(!$admin){
        switch($page){
            case "signup":
                require_once($dir."signup.php");
                break;
            default:
                require_once($dir."login.php");
                break;
        }
    }
    else{
        switch($page){
            case "news":
            case "posts":
            case "login":
            case "signup":
            case "":
                //PAGINATION SETTINGS
                $toShow = 5;
                require_once("controller/post_list.php");
                require_once($dir."posts.php");
                break;
            case "users":
                $toShow = 5;
                require_once("controller/user_list.php");
                require_once($dir."users.php");
                break;
            case "contacts":
                $toShow = 5;
                require_once("controller/contact_list.php");
                require_once($dir."contacts.php");
                break;
            default:
                require_once($dir."404.php");
                break;
        }
    }
    exit;
}

?>