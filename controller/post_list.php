<?php

require_once('base/db_config.php');
require_once('helper/pagination.php');

if(isset($_GET['post-page']) && $_GET['post-page'])
    $postPage = $_GET['post-page'];
else
    $postPage = 1;

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $limit = $toShow??9;
    $pages = $pageDisplay??5;
    $skip = $limit * ($postPage - 1);
    $posts = selectQuery('posts', $skip, $limit);
    $totalPosts = countQuery('posts');
    $pagination = paginate($totalPosts['count'], $postPage, $limit, $pages);
}
 
?>