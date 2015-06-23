<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function addEditInformation($params){
    $idInformation = $params['idInformation'];
    $title = $params['title'];
    $content = $params['content'];

    $connection = dbConnect();
    $response = array();
    
    if($idInformation !== "0"){
        $query = "UPDATE `Information` SET `content`='$content', `title`='$title' WHERE idInformation='$idInformation'";

    }else{
            $query = "INSERT INTO `Information`(`content`,`title` ) VALUES ('$content','$title')";
         }
     $result = mysql_query($query, $connection);

     if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Information saved with success";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);

    return $response;

}



function getInformation($params){
    $connection = dbConnect();
    $response = array();

    $query = "Select * From Information";
    $result = mysql_query($query, $connection);
    if($result){
        while($information = mysql_fetch_array($result)){
            $response[] = $information;
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

function getInformationById($params){
    $idInformation = $params['idInformation'];

    $connection = dbConnect();

    $query = "Select * From Information Where idInformation='$idInformation'";
    $result = mysql_query($query, $connection);
    $response = array();

    if(mysql_num_rows($result) === 1){
       $response = mysql_fetch_array($result);
       $response['cod'] = 200;

        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($connection);;
        }

    mysql_close($connection);
    return $response;
}



function deleteInformation($params){
    $idInformation = $params['idInformation'];

    $conn = dbConnect();
    $query = "DELETE FROM Information WHERE idInformation=$idInformation";
    $result = mysql_query($query, $conn);
    $response = array();

    if ($result) {
        $response['cod'] = 200;
        $response['error'] = FALSE;
        $response['msg'] = "Information successfully deleted";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}
