<?php

if(isset($_GET['page']) && is_numeric($_GET['page']) && $_GET['page'])
    $listPage = clean_input($_GET['page']);
else
    $listPage = 1;

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $limit = $toShow??9;
    $pages = $pageDisplay??5;
    $skip = $limit * ($listPage - 1);
    $users = selectQuery('users', $skip, $limit, 'users_id,users_username,users_is_admin_approved,users_created_at,users_updated_at');
    $columns = getColumns($users[0]??$users);
    $totalUsers = countQuery('users');
    $pagination = paginate($totalUsers['count'], $listPage, $limit, $pages);
}
 
?>