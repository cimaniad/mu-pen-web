<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function addDirectory($params){
    $name = $params['name'];
    
    $connection = dbConnect();
    $response = array();
    
    $query = "Select * From Directory Where name='$name'";
    $resul = mysql_query($query, $connection);
    
   if(mysql_num_rows($resul) === 0){
       $query = "INSERT INTO `Directory` (`name`) VALUES ('$name')";
        }else{
            $response['cod'] = 501;
            $response['error'] = TRUE;
            $response['msg'] = "Name already exists";
            mysql_close($connection);
            return $response;
   }
    $result = mysql_query($query, $connection);
    
    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Directory saved with success";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);

    return $response;
}

function addMultimedia($params){
    
}

