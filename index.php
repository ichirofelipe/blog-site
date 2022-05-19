<?php
    if(isset($_GET['page']) && $_GET['page'])
        $page = $_GET['page'];
    else
        $page = "home";

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
        default:
            include_once("views/home.php");
            break;
    }
        
    
?>