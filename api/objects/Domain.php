<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function addEditDomain($params){
    $idDomain = $params['idDomain'];
    $name = $params['name'];
    $description = $params['description'];

    $connection = dbConnect();
    $response = array();

    $query = "Select * From Domain Where name='$name'";
    $resul = mysql_query($query, $connection);
    //Testing if name is already given to a Domain
    if($idDomain !== "0"){
        $query = "UPDATE `Domain` SET `name`='$name', `description`='$description' WHERE `idDomain`='$idDomain';";

    }else{
        if(mysql_num_rows($resul) === 0){
            $query = "INSERT INTO `Domain` (`name`, `description`) VALUES ('$name', '$description')";
         }else {
            $response['cod'] = 501;
            $response['error'] = TRUE;
            $response['msg'] = "Domain already exists";
            mysql_close($connection);
            return $response;
   }
  }
     $result = mysql_query($query, $connection);

     if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Domain saved with success";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);

    return $response;

}



function getDomains($params){
    $connection = dbConnect();
    $response = array();

    $query = "Select * From Domain";
    $result = mysql_query($query, $connection);
    if($result){
        while($domains = mysql_fetch_array($result)){
            $response[] = $domains;
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


function getDomainById($params){
    $idDomain = $params['idDomain'];

    $connection = dbConnect();

    $query = "Select * From Domain Where idDomain='$idDomain'";
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



function deleteDomain($params){
    $idDomain = $params['idDomain'];

    $conn = dbConnect();
    $query = "DELETE FROM Domain WHERE idDomain=$idDomain";
    $result = mysql_query($query, $conn);
    $response = array();

    if ($result) {
        $response['cod'] = 200;
        $response['error'] = FALSE;
        $response['msg'] = "Domain successfully deleted";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}
