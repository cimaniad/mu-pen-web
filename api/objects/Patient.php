<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';


function getPatient($params){
    $id = $params['idPatient'];
    $connection = dbConnect();
    $query = "Select * From Patient Where idPatient=$id";
    $result = mysql_query($query, $connection);
    $response = array();
    if(mysql_num_rows($result)===1){
       $response = mysql_fetch_array($result);
     }else {
      $response['msg'] = "Patient does not exist";
      $response['error'] = TRUE;
      $response['cod'] = 404;  
 }
    mysql_close($connection);
    return $response;
}