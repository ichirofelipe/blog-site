<?php

function getColumns($data){
    $tmpData = [];

    foreach($data as $key => $value){
        array_push($tmpData, $key);
    }

    return $tmpData;
}

?>