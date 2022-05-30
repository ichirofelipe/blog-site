<?php
require_once('action/authentication.php');

$page = $_GET['page_code']??'home';

/*=====================*\
          ADMIN
\*=====================*/

if((isset($_GET['admin_code']) && $_GET['admin_code']) || $page == 'admin'){
    $page = $active = $_GET['admin_code']??'';
    $dir = "include/pages/admin/";


    include_once($dir."layout/header.php");

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
                require_once("action/post_list.php");
                require_once($dir."posts.php");
                break;
            case "users":
                $toShow = 5;
                require_once("action/user_list.php");
                require_once($dir."users.php");
                break;
            case "contacts":
                $toShow = 5;
                require_once("action/contact_list.php");
                require_once($dir."contacts.php");
                break;
            default:
                require_once($dir."404.php");
                break;
        }
    }
    closeConn();
    include $dir.'layout/footer.php';

    exit;
}

?>