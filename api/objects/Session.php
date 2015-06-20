
<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function saveSession($params){
  $idPatient = $params['idPatient'];
  $idHealthProfessional = $params['idHealthProfessional'];
  $idBlock = $params['idBlock'];
  $deadLine = $params['deadLine'];

  $connection = dbConnect();
  $query = "INSERT INTO Session (idPatient, idHealthProfessional, idBlock, deadLine) VALUES($idPatient, $idHealthProfessional, $idBlock, $deadLine)";
  $result = mysql_query($query, $connection);

   if ($result) {
      $response['cod'] = 201;
      $response['error'] = FALSE;
      $response['msg'] = 'Session created with success';
  } else {
      $response['cod'] = 500;
      $response['error'] = TRUE;
      $response['msg'] = mysql_error($connection);
  }

  mysql_close($connection);

  return $response;
}

function getSessionPatient($params){
  $idPatient = $params['idPatient'];
  $connection = dbConnect();
  $query = "SELECT b.name, s.idSession, s.deadLine FROM Block b, Session s "
          . "WHERE s.idPatient='$idPatient' and s.idBlock = b.idBlock;";
  $result = mysql_query($query, $connection);
  if ($result) {
      while ($Session = mysql_fetch_array($result)) {
          $response[] = $Session;
      }
      $response['cod'] = 200;
  } else {
      $response['cod'] = 500;
      $response['error'] = TRUE;
      $response['msg'] = mysql_error($connection);
  }
  mysql_close($connection);
  return $response;
}

function getExercisesBySession($params){
    $idSession = $params['idSession'];
    $connection = dbConnect();
    $query = "Select e.idExercise, e.idStandardExercise, se.name as stdName,
        e.name as eName, se.picture From Exercise e, StandardExercise se Where e.idStandardExercise=se.idStandardExercise and e.idExercise in
        (Select idExercise From AssignExercise Where idBlock in
        (Select idBlock From Block Where idBlock in
        (Select idBlock From Session Where idSession ='$idSession')))";
    $result = mysql_query($query, $connection);
      if ($result) {
      while ($exercises = mysql_fetch_array($result)) {
          $response[] = $exercises;
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
