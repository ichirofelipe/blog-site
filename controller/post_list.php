<?php

require_once('base/db_config.php');
require_once('helper/pagination.php');
require_once('helper/table.php');

if(isset($_GET['list-page']) && $_GET['list-page'])
    $listPage = $_GET['list-page'];
else
    $listPage = 1;

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $limit = $toShow??9;
    $pages = $pageDisplay??5;
    $skip = $limit * ($listPage - 1);
    $posts = selectQuery('posts', $skip, $limit, 'id,title,url,description,created_at');
    $columns = getColumns($posts[0]);
    $totalPosts = countQuery('posts');
    $pagination = paginate($totalPosts['count'], $listPage, $limit, $pages);
}
 
?>