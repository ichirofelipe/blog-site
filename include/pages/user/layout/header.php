<?php
closeConn();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Best Bookmark</title>

        <link rel="stylesheet" href="/assets/css/app.css?v=<?=date('YmHdis')?>">
        <script src="/assets/js/jquery.js"></script>

    </head>

    <body class="d-flex flex-column justify-between">
        <div class="content pt-6 <?= isset($status) && $status?'d-flex flex-1':'' ?>">
            <?php include 'nav.php' ?>