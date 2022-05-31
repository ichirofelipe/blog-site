<?php
// $title = ucfirst(clean_input($title??$_GET['page_title']??'Home'));

if(isset($_GET['page_title']) && $_GET['page_title'] && !isset($title)){
    $title = clean_input($_GET['page_title']);
}
if(!isset($title)){
    $title = 'Home';
}
$title = ucfirst($title);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?> | Best Bookmark</title>

        <meta property="title" content="<?= $title??"Best Bookmark" ?>">
        <meta property="og:url" content="<?= $url??$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
        <meta property="og:description" content="<?= $description??"This is bookmark website" ?>">

        <link rel="stylesheet" href="/assets/css/app.css?v=<?=date('YmHdis')?>">
        <script src="/assets/js/jquery.js"></script>

    </head>

    <body class="d-flex flex-column justify-between">
        <div class="content pt-6 <?= isset($status) && $status?'d-flex flex-1':'' ?>">
            <?php include 'nav.php' ?>