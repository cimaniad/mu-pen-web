<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getStandardExercises($params){
   
    $connection = dbConnect();
    $response = array();
    $query = "Select * From StandardExercise";
    $result = mysql_query($query, $connection);
    
    if($result){
         while($exercises = mysql_fetch_array($result)){
            $response[] = $exercises;
        }
            $response['cod'] = 200;

     } else {
        $response['msg'] =  mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
    
}

function getExerciseByStandardExercise($params){
    $idStandard = $params['idStandardExercise'];

    $connection = dbConnect();

    $query = "Select * From Exercise Where idStandardExercise='$idStandard'";
    $result = mysql_query($query, $connection);
    $response = array();

    if(mysql_num_rows($result) !== 0){
        while($exercises = mysql_fetch_array($result)){
           $response[] = $exercises;
        }
       $response['cod'] = 200;

        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($connection);;
        }

    mysql_close($connection);
    return $response;
}
