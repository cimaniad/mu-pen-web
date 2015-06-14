<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getExerciseBySubDomain($params){
    $idSubDomain = $params['idSubDomain'];

    $conn = dbConnect();
    $query = "SELECT e.idExercise, e.name, e.level, e.description, e.time, se.picture, d.name as domain, sd.name as subDomain
      from Exercise e, StandardExercise se, Domain d, subDomain sd
      where e.idSubDomain = $idSubDomain and e.idStandardExercise = se.idStandardExercise and e.idSubDomain = sd.idSubDomain and sd.idDomain = d.idDomain";
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

function saveEditExercise($params){
    $idExercise = $params['idExercise'];
    $idStandardExercise = $params['idStandardExercise'];
    $idSubDomain = $params['idSubDomain'];
    $name = $params['name'];
    $question = $params['question'];
    $time = $params['time'];
    $level = $params['level'];
    $numMatriz = $params['numMatriz'];
    $appearTime = $params['appearTime'];
    $initialTime = $params['initialTime'];

    $connection = dbConnect();
    $response = array();

    $query = "Select * From Exercise Where name='$name'";
    $resul = mysql_query($query, $connection);

   if(mysql_num_rows($resul) === 0){
        if($idExercise !== "0"){
            $query = "UPDATE `Exercise` SET "
                . "`idStandardExercise`='$idStandardExercise', `idSubDomain`='$idSubDomain', `name`='$name', "
                . "`question`='$question', `time`='$time', `level`='$level', `numMatriz`='$numMatriz', "
                    . "`appearTime`='$appearTime', `inicialTime`='$initialTime' "
                . "WHERE `idExercise`='$idExercise'";
        }else {
            $query = "INSERT INTO `Exercise` "
                . "(`idStandardExercise`, `idSubDomain`, `name`, `question`, `time`, `level`, `numMatriz`, `appearTime`, `inicialTime`) "
                . "VALUES ('$idStandardExercise', '$idSubDomain', '$name', '$question', '$time', '$level', '$numMatriz', '$appearTime', '$initialTime');";
        }
   }
   else {
        $response['cod'] = 501;
        $response['error'] = TRUE;
        $response['msg'] = 'Name already exists';
        mysql_close($connection);
        return $response;
   }
    $result = mysql_query($query, $connection);

     if ($result) {
        $response['idExercise'] = mysql_insert_id();
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

function getExercisesByBlock($params){
  $idBlock=$params['idBlock'];

  $connection = dbConnect();
  $response = array();
  $query = "SELECT e.idExercise, e.name, e.description, e.level, e.time, se.picture, d.name
                                                  AS domain, sd.name AS subDomain
            FROM Exercise e, StandardExercise se, AssignExercise ae, Domain d, subDomain sd
            WHERE ae.idBlock = $idBlock AND ae.idExercise=e.idExercise AND e.idStandardExercise = se.idStandardExercise
                                              AND e.idSubDomain = sd.idSubDomain AND sd.idDomain = d.idDomain ;";
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

function getExercises($params){
    $connection = dbConnect();
    $response = array();

    $query = "Select * From Exercise";
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

function getExerciseById($params){
    $idExercise = $params['idExercise'];
    $connection = dbConnect();
    $response = array();

    $query = "Select * From Exercise Where idExercise='$idExercise'";
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


function editPairsExercise($params){
    $idExercise = $params['idExercise'];
    $numMatriz = $params['numMatriz'];
    $appearTime = $params['appearTime'];
    $initialTime = $params['initialTime'];
    $question = $params['question'];
    $time = $params['time'];
    $level = $params['level'];

    $connection = dbConnect();
    $query = "UPDATE `Exercise` SET `numMatriz`='$numMatriz', `appearTime`='$appearTime', "
            . "`inicialTime`='$initialTime', `question`='$question', `time`='$time', `level`='$level' "
            . "WHERE `idExercise`='$idExercise'";

    $response = array();
    $result = mysql_query($query, $connection);

    if ($result) {
        $response['cod'] = 200;
        $response['error'] = FALSE;
        $response['msg'] = 'Exercise changed with success';
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
}
