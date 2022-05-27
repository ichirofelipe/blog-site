<?php
    require_once('controller/authentication.php');
    require_once('functions.php');
    
    
    /*=====================*\
            FRONT
    \*=====================*/
    $pages = ["home","about","contact","terms","post"];
    $flex_content = false;
    if(!in_array($page, $pages)){
        $flex_content = true;
    }

    include_once("views/includes/header.php");

    if(isset($_SESSION['alert']) && $_SESSION['alert'] != ''){
        include_once("views/includes/alert.php");
        unset($_SESSION['alert']);
    }

    switch($page){
        case "home":
            require_once("controller/post_list.php");
            include_once("views/home.php");
            break;
        case "about":
            include_once("views/about.php");
            break;
        case "contact":
            include_once("views/contact.php");
            break;
        case "terms":
            include_once("views/terms.php");
            break;
        case "post":
            if(!isset($_GET['post_id'])){
                if(!$user){
                    header('Location: /');
                }
                include_once("views/post.php");
                break;  
            }
            require_once("controller/post_list.php");
            include_once("views/post_view.php");
            break;
        default:
            require_once("views/404.php");
            break;
    }
?>