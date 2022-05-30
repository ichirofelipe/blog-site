<?php

$listPage = $_GET['page'] ?? 1;

header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $limit = $toShow??9;
    $pages = $pageDisplay??5;
    $skip = $limit * ($listPage - 1);
    $contacts = selectQuery('contacts', $skip, $limit, 'id,name,email,phone,message,created_at');
    $columns = getColumns($contacts[0]??$contacts);
    $totalContacts = countQuery('contacts');
    $pagination = paginate($totalContacts['count'], $listPage, $limit, $pages);
}
 
?>