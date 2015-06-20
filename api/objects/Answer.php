<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function saveResult($params){
    $idPatient = $params['idPatient'];
    $idExercise = $params['idExercise'];
    $resolutionTime = $params['resolutionTime'];
    $attempts = $params['attempts'];
    $wrongHits = $params['wrongHits'];
    $rightHits = $params['rightHits'];
    $correctAnswer = $params['correctAnswer'];
    $numQuadrados = $params['numQuadrados'];
     
    $connection = dbConnect();
    $response = array();
    
    $query = "INSERT INTO `Answer` "
            . "(`idPatient`, `idExercise`, `resolutionTime`, `attempts`, `wrongHits`, `rightHits`, `correctAnswer`, `numQuadrados`) "
            . "VALUES ('$idPatient', '$idExercise', '$resolutionTime', '$attempts', '$wrongHits', '$rightHits', '$correctAnswer', '$numQuadrados')";
    
    $result = mysql_query($query, $connection);
    
     if ($result) {
        $response['idAnswer'] = mysql_insert_id();
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = 'Answer created with success';
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
}

function teste($params){
    $connection = dbConnect();
    $query = "Select * From Answer Where idAnswer='6'";
    $result = mysql_query($query, $connection);
    $response = array();
    if (mysql_num_rows($result) === 1) {
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Error";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}