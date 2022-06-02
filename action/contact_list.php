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
    $contacts = selectQuery('contacts', $skip, $limit, 'contacts_id,contacts_name,contacts_email,contacts_phone,contacts_message,contacts_created_at');
    $columns = getColumns($contacts[0]??$contacts);
    $totalContacts = countQuery('contacts');
    $pagination = paginate($totalContacts['count'], $listPage, $limit, $pages);
}
 
?>