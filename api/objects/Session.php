<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function saveSession($params){
  $idPatient = $params['idPatient'];
  $idHealthProfessional = $params['idHealthProfessional'];
  $idBlock = $params['idBlock'];
  $deadLine = $params['deadLine'];

  $connection = dbConnect();
  $query = "INSERT INTO Session (idPatient, idHealthProfessional, idBlock, deadLine) VALUES($idPatient, $idHealthProfessional, $idBlock, '$deadLine')";
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
  $query = "SELECT * FROM Session WHERE idPatient=$idPatient";
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
