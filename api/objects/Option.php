<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function saveEditOption($params){
    $idOption = $params['idOption'];
    $idExercise = $params['idExercise'];
    $description = $params['description'];
    $correctOption = $params['correctOpt'];
    $position = $params['position'];

    $connection = dbConnect();
    $response = array();

    if($idOption !== "0"){
        $query = "UPDATE `Option` SET `idExercise`='$idExercise', `description`='$description', `correctOpt`='$correctOption', "
                . "`position`='$position' WHERE `idOption`='$idOption'";
    }else {
        $query = "INSERT INTO `Option` (`idExercise`, `description`, `correctOpt`, `position`)"
                . " VALUES ('$idExercise', '$description', '$correctOption', '$position');";
    }
    $result = mysql_query($query, $connection);
    if ($result) {
          $response['cod'] = 201;
          $response['error'] = FALSE;
          $response['msg'] = 'Exercise created/changed with success';


    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
}

function getOptionsbyExercise($params){
    $idExercise = $params['idExercise'];
    $connection = dbConnect();
    $response = array();

    $query = "Select * From `Option` Where idExercise='$idExercise'";
    $result = mysql_query($query, $connection);
    if(mysql_num_rows($result) !== 0){
        while($options = mysql_fetch_array($result)){
        $response[] = $options;
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


function countOptions($params){
    $idExercise = $params['idExercise'];
    $connection = dbConnect();
    $response = array();

    $query = "Select count(*) as options From `Option` Where idExercise='$idExercise'";
    $result = mysql_query($query, $connection);

    if($result){
         $response = mysql_fetch_array($result);
         $response['cod'] = 200;
    }
     else {
        $response['msg'] =  mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}


function countCorrectOptions($params){
   $idExercise = $params['idExercise'];
   $connection = dbConnect();
   $response = array();
   $query = "Select count(idOption) as answers From `Option` Where idExercise='$idExercise' and correctOpt=1";
   $result = mysql_query($query, $connection);

    if($result){
         $response = mysql_fetch_array($result);
         $response['cod'] = 200;
    }
     else {
        $response['msg'] =  mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function correctOrderExercise($params){
    $idExercise = $params['idExercise'];
    $connection = dbConnect();
    $response = array();

    $query = "Select * From `Option` Where idExercise='$idExercise' order by position";
    $result = mysql_query($query, $connection);

    if($result){
        while($option = mysql_fetch_array($result)){
         $response[] = $option['idOption'];
        }
         $response['cod'] = 200;
    }
     else {
        $response['msg'] =  mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getOptionById($params){
    $idOption = $params['idOption'];
    $connection = dbConnect();
    $response = array();

    $query = "Select * From `Option` Where idOption='$idOption'";
    $result = mysql_query($query, $connection);
    if(mysql_num_rows($result) === 1){
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;

     } else {
        $response['msg'] =  mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}