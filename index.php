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
                case "contact":
                    require_once("controller/contact.php");
                    break;
            }
        }
    }

    
    include_once("views/includes/header.php");

    session_start();
    if(isset($_SESSION['alert']) && $_SESSION['alert'] != ''){
        include_once("views/includes/alert.php");
        // unset($_SESSION['alert']);
    }
    
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
            if(!$user){
                header('Location: /');
            }
            include_once("views/post.php");
            break;
        default:
            require_once("controller/post_list.php");
            include_once("views/home.php");
            break;
    }


    function includeWithVariables($filePath, $variables = array(), $print = true)
    {
        $output = NULL;
        
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;

    }
?>