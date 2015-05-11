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
           $response['msg'] = 'No SubDomains with that idDomain';
        }
           
    mysql_close($conn);
    return $response;
}