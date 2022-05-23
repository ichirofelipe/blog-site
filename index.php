<?php
    require_once('controller/authentication.php');

    if(isset($_GET['page']) && $_GET['page'])
        $page = $_GET['page'];
    else
        $page = "home";

    if(count(explode('/',$page)) > 1){
        $page = explode('/',$page);
        
        if($page[0] == 'controller'){
            switch($page[1]){
                case "signup":
                    require_once("controller/signup.php");
                    break;
                case "logout":
                    require_once("controller/logout.php");
                    break;
                case "login":
                    require_once("controller/login.php");
                    break;
                case "post":
                    require_once("controller/post.php");
                    break;
            }
        }
        
    }

    include_once("views/includes/header.php");
    
    switch($page){
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
            if(!$user)
                include_once("views/home.php");
            include_once("views/post.php");
            break;
        default:
            require_once("controller/post_list.php");
            include_once("views/home.php");
            break;
    }
?>