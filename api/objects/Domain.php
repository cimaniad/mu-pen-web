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
            $response['msg'] = "Nome já existe";
            mysql_close($connection);
            return $response;
   }
  }
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

function addEditSubDomain($params){
    $idSubDomain = $params['idSubDomain'];
    $idDomain = $params['idDomain'];
    $name = $params['name'];
    $description = $params['description'];
    
    $connection = dbConnect();
    $response = array();
    
    $query = "Select * From subDomain Where name='$name'";
    $resul = mysql_query($query, $connection);
    //Testing if name is already given to a SubDomain
// if(mysql_num_rows($resul) === 0){   
    if($idSubDomain !== "0"){
        $query = "UPDATE `subDomain` SET `name`='$name', `description`='$description', `idDomain`='$idDomain' "
                . "WHERE `idSubDomain`='$idSubDomain'";
    }else{
        if(mysql_num_rows($resul) === 0){
        $query = "INSERT INTO `subDomain` (`name`, `description`, `idDomain`)VALUES ('$name', '$description', '$idDomain')";
        }else{
            $response['cod'] = 501;
            $response['error'] = TRUE;
            $response['msg'] = "Nome já existe";
            mysql_close($connection);
            return $response; 
        }
    }
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

function getSubDomainByDomain($params){
    $idDomain = $params['idDomain'];
    
    $connection = dbConnect();
   
    $query = "Select * From subDomain Where idDomain='$idDomain'";
    $result = mysql_query($query, $connection);
    $response = array();
    
    if(mysql_num_rows($result) !== 0){
        while($subDomains = mysql_fetch_array($result)){
           $response[] = $subDomains;
        }
       $response['cod'] = 200;
      
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = 'No SubDomains with that idDomain';
        }
           
    mysql_close($connection);
    return $response;
}