<?php

function paginate($totalPosts, $currentPage = 1, $perPage = 9, $pageToDisplay = 5){
    //DECLARE VARIABLES
    $pagination['start'] = $pagination['end'] = $pagination['limit'] = null;

    $tmp = $currentPage % $pageToDisplay;
    
    //GET MAX PAGES
    $pagination['limit'] = ceil($totalPosts / $perPage);

    //GET PAGINATION START AND END
    $pagination['start'] = $currentPage - ($pageToDisplay - 1);
    $pagination['end'] = (int)$currentPage;
    if($tmp != 0){
        $pagination['start'] = $currentPage - ($tmp - 1);
        $pagination['end'] = $currentPage + ($pageToDisplay - $tmp);
    }
    if($pagination['end'] > $pagination['limit'])
        $pagination['end'] = $pagination['limit'];

    if($pagination['limit'] < 2)
        return null;
    
    return $pagination;
}

?>