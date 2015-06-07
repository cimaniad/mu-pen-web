<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function addComment($params){
    $idAnswer = $params['idAnswer'];
    $comment = $params['comment'];
    
    $connection = dbConnect();
    $response = array();
    
    $query = "INSERT INTO `Comments` (`idAnswer`, `comment`) VALUES ('$idAnswer', '$comment')";
    $result = mysql_query($query, $connection);
    
    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = 'Comment created with success';
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
}

