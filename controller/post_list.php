<?php

require_once('base/db_config.php');

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $posts = selectQuery('posts');
}
 
?>