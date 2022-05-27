<?php

require_once('base/db_config.php');
require_once('helper/pagination.php');
require_once('helper/table.php');

if(isset($_GET['page']) && $_GET['page'])
    $listPage = $_GET['page'];
else
    $listPage = 1;

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $limit = $toShow??9;
    $pages = $pageDisplay??5;
    $skip = $limit * ($listPage - 1);
    $users = selectQuery('users', $skip, $limit, 'id,username,is_admin_approved,created_at');
    $columns = getColumns($users[0]);
    $totalUsers = countQuery('users');
    $pagination = paginate($totalUsers['count'], $listPage, $limit, $pages);
}
 
?>