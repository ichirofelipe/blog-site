<?php
    require_once('action/authentication.php');

    $page = $_GET['page_code']??'home';
    $dir = "include/pages/user/";
    
    
    /*=====================*\
            FRONT
    \*=====================*/

    include_once($dir."layout/header.php");

    switch($page){
        case "home":
            require_once("action/post_list.php");
            include_once($dir."home.php");
            break;
        case "about":
            include_once($dir."about.php");
            break;
        case "contact":
            include_once($dir."contact.php");
            break;
        case "terms":
            include_once($dir."terms.php");
            break;
        case "post":
            if(!isset($_GET['post_id'])){
                if(!$user){
                    header('Location: /');
                }
                include_once($dir."post.php");
                break;  
            }
            require_once("action/post_list.php");
            include_once($dir."post_view.php");
            break;
        case "403":
            require_once($dir."403.php");
            break;
        default:
            require_once($dir."404.php");
            break;
    }
    closeConn();

    include_once($dir."layout/footer.php");
?>