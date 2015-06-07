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
    
    $connection = dbConnect();
    $response = array();
    
    $query = "INSERT INTO `Answer` "
            . "(`idPatient`, `idExercise`, `resolutionTime`, `attempts`, `wrongHits`, `rightHits`, `correctAnswer`) "
            . "VALUES ('$idPatient', '$idExercise', '$resolutionTime', '$attempts', '$wrongHits', '$rightHits', '$correctAnswer')";
    
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