<?php

function paginate($totalPosts, $currentPage = 7, $perPage = 3, $pageToDisplay = 4){
    $pagination['start'] = $pagination['end'] = $pagination['limit'] = null;
    $tmp = $currentPage % $pageToDisplay;
    $pagination['limit'] = $totalPosts / $perPage;

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