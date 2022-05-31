<?php

if(isset($_GET['page']) && $_GET['page'])
    $listPage = clean_input($_GET['page']);
else
    $listPage = 1;

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $limit = $toShow??9;
    $pages = $pageDisplay??5;
    $skip = $limit * ($listPage - 1);
    $posts = selectQuery('posts', $skip, $limit, 'id,title,url,description,created_at');
    if(isset($_GET['post_id']))
        $posts = findQuery($_GET['post_id'], 'posts');
    $columns = getColumns($posts[0]??$posts);
    $totalPosts = countQuery('posts');
    $pagination = paginate($totalPosts['count'], $listPage, $limit, $pages);
}
 
?>