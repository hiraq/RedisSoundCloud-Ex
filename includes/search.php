<?php

if (\Core\Request::isAjaxRequest()) {
    
    //set delay
    sleep(5);
    
    //get search query
    $query = $_POST['query'];
    
    echo json_encode($query);    
    
}