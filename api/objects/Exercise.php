<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getExerciseBySubDomain($params){
    $idSubDomain = $params['idSubDomain'];
    
    $conn = dbConnect();
    $query = "SELECT * FROM Exercise WHERE idSubDomain='$idSubDomain'";
    $result = mysql_query($query, $conn);
    $response = array();
    
    if(mysql_num_rows($result) !== 0){
      while($exercises = mysql_fetch_array($result)){
           $response[] = $exercises;
        }
       $response['cod'] = 200;
      
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = 'No Exercises with that subDomain';
        }
           
    mysql_close($conn);
    return $response;
}

function saveAssignExercise($params){
    $idBlock = $params['idBlock'];
    $idExercise = $params['idExercise'];
    
    $connection = dbConnect();
    $response = array();
    $query = "INSERT INTO `AssignExercise` (`idBlock`, `idExercise`) VALUES ('$idBlock', '$idExercise')";
    $result = mysql_query($query, $connection);

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = mysql_error($connection);
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;       
    
}

function getOptions($params){
    $idExercise = $params['idExercise'];
    
    $conn = dbConnect();
    $query = "Select * From `Option` Where idOption in (Select idOption From HighlightedOptions "
            . "Where idExercise = '$idExercise')";
    $result = mysql_query($query, $conn);
    $response = array();
    
    if(mysql_num_rows($result) !== 0){
      while($exercises = mysql_fetch_array($result)){
           $response[] = $exercises;
        }
       $response['cod'] = 200;
      
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($conn);
        }
           
    mysql_close($conn);
    return $response;
}

function getIdOptionByDescription($params){
    $descriptionOption = $params['descriptionOption'];
    
    $conn = dbConnect();
    $query = "Select * From `Option` Where description = '$descriptionOption'";
    $result = mysql_query($query, $conn);
    $response = array();
    
    if(mysql_num_rows($result) === 1){
       $response = mysql_fetch_array($result);
       $response['cod'] = 200;
      
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($conn);
        }
           
    mysql_close($conn);
    return $response;
}

function getCorrectOption($params){
    $idOption = $params['idOption'];
    $idExercise = $params['idExercise'];
    
    $conn = dbConnect();
    $query = "Select * From HighlightedOptions Where idOption = '$idOption' and idExercise='$idExercise'";
    $result = mysql_query($query, $conn);
    $response = array();
    
    if(mysql_num_rows($result) === 1){
      $response = mysql_fetch_array($result);
       $response['cod'] = 200;
      
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($conn);
        }
           
    mysql_close($conn);
    return $response;
}

function getExerciseById($params){
    $idExercise = $params['idExercise'];
    
    $connection = dbConnect();
   
    $query = "Select * From Exercise Where idExercise='$idExercise'";
    $result = mysql_query($query, $connection);
    $response = array();
    
    if(mysql_num_rows($result) === 1){
        $response = mysql_fetch_array($result);
        $response['error'] = FALSE;
        $response['cod'] = 200;
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($connection);
        }
           
    mysql_close($connection);
    return $response;
}

