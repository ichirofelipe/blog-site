<?php
    require_once('action/authentication.php');

    
    /*=====================*\
            FRONT
    \*=====================*/

    // $page = clean_input($_GET['page_code']??'home');

    if(isset($_GET['page_code']) && $_GET['page_code']){
        $page = clean_input($_GET['page_code']);

        $dir = "include/pages/user/";

        //HEADER VARIABLES
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
                if(!$user){
                    header('Location: /');
                }
                include_once($dir."post.php");
                break;
            case "post_view":
                include_once($dir."post_view.php");
                break;
            default:
                require_once("action/post_list.php");
                include_once($dir."home.php");
                break;
        }
        closeConn();

        include_once($dir."layout/footer.php");

        exit;
    }
    
    if(isset($_GET['admin_code']) && $_GET['admin_code']){
        $page = clean_input($_GET['admin_code']);

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
                case "posts":
                case "":
                    //PAGINATION SETTINGS
                    $toShow = 6;
                    require_once("action/post_list.php");
                    require_once($dir."posts.php");
                    break;
                case "users":
                    //PAGINATION SETTINGS
                    $toShow = 6;
                    require_once("action/user_list.php");
                    require_once($dir."users.php");
                    break;
                case "contacts":
                    //PAGINATION SETTINGS
                    $toShow = 6;
                    require_once("action/contact_list.php");
                    require_once($dir."contacts.php");
                    break;
                case "login":
                case "signup":
                    header('Location: /admin/posts');
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