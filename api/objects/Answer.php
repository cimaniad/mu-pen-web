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
    $idSession = $params['idSession'];
     
    $connection = dbConnect();
    $response = array();
    
    $query = "INSERT INTO `Answer` "
            . "(`idPatient`, `idExercise`, `resolutionTime`, `attempts`, `wrongHits`, `rightHits`, `correctAnswer`, `numQuadrados`, `idSession`) "
            . "VALUES ('$idPatient', '$idExercise', '$resolutionTime', '$attempts', '$wrongHits', '$rightHits', '$correctAnswer', '$numQuadrados', '$idSession')";
    
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
function getAnswersByExercise($params){
    $idSession = $params['idSession'];
    $idExercise = $params['idExercise'];
    $connection = dbConnect();   
    $query = "Select * From Answer Where idExercise='$idExercise' and idSession='$idSession'";
    $result = mysql_query($query, $connection);
        
      if ($result) {
          while($answer = mysql_fetch_array($result)){
              $response[] = $answer;
          }
         $response['cod'] = 200;   
    } else {
      $response['cod'] = 404;
      $response['error'] = TRUE;
      $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
    
}


function countAnswers($params){
    $idSession = $params['idSession'];
    $idExercise = $params['idExercise'];
    $connection = dbConnect();   
    $query = "Select idExercise, count(*) as num From Answer "
            . "Where idExercise='$idExercise' and idSession='$idSession'";
    $result = mysql_query($query, $connection);
        
      if (mysql_num_rows($result) === 1) {
         $response = mysql_fetch_array($result);
         $response['cod'] = 200;   
    } else {
      $response['cod'] = 404;
      $response['error'] = TRUE;
      $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
    
}

function getSessionAnswers($params){
    $idSession = $params['idSession'];
    
    $connection = dbConnect();
    $response = array();
    $query = "Select a.*, st.idStandardExercise, st.name "
            . "From Answer a, StandardExercise st "
            . "Where idSession='$idSession' and st.idStandardExercise in "
            . "(Select idStandardExercise From Exercise where idExercise=a.idExercise ) ;";
        $result = mysql_query($query, $connection);
        
      if ($result) {
          while($answers = mysql_fetch_array($result)){
          $response[] = $answers;
          }
         $response['cod'] = 200;   
    } else {
      $response['cod'] = 404;
      $response['error'] = TRUE;
      $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}