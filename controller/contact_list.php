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
    $contacts = selectQuery('contacts', $skip, $limit, 'id,name,email,phone,message,created_at');
    $columns = getColumns($contacts[0]);
    $totalContacts = countQuery('contacts');
    $pagination = paginate($totalContacts['count'], $listPage, $limit, $pages);
}
 
?>