<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function deleteBlock($params){
    $idBlock = $params['idBlock'];
    
    $conn = dbConnect();
    $query = "DELETE FROM Block WHERE idBlock=$idBlock";
    $result = mysql_query($query, $conn);
    $response = array();
    
    if ($result) {
        $response['cod'] = 200;
        $response['error'] = FALSE;
        $response['msg'] = "Block successfully deleted";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}

function getBlockByName($params){
    $name = $params['name'];
    
    $conn = dbConnect();
    $query = "SELECT * FROM Block where name like '%$name%'";
    $result = mysql_query($query, $conn);
    $response = array();
    
    if ($result) {
        while ($block = mysql_fetch_array($result)) {
            $response[] = $block;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}