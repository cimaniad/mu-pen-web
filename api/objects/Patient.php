<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';


function getPatient($params){
    $id = $params['idPatient'];
    $connection = dbConnect();
    $query = "Select * From Patient Where idPatient='$id'";
    $result = mysql_query($query, $connection);
    $response = array();
    if(mysql_num_rows($result)===1){
       $response = mysql_fetch_array($result);
       $response['cod'] = 200;
     }else {
      $response['msg'] = "Patient does not exist";
      $response['error'] = TRUE;
      $response['cod'] = 404;  
 }
    mysql_close($connection);
    return $response;
}

function getPatientsByHealthProfessional($params){
    $id = $params['idProfessionalHealth'];
    $connection = dbConnect();
    $query = "Select * From Patient Where idHealthProfessional='$id'";
    $result = mysql_query($query, $connection);
    $response = array();
    if($result){
      while($patients = mysql_fetch_array($result)){
      $response[] = $patients;
      $response['cod'] = 200;
      }
     }else {
      $response['msg'] = "Health Professional does not have Patients";
      $response['error'] = TRUE;
      $response['cod'] = 404;  
 }
    mysql_close($connection);
    return $response;
}

function saveEditPatient($params){
    $idPatient = $params['idPatient'];
    $idHealthProfessional = $params['idHealthProfessional'];
    $name = $params['name'];
    $lastName = $params['lastName'];
    $numCc = $params['numCC'];
    $adress = $params['adress'];
    $numTel = $params['numTel'];
    $nif = $params['nif'];
    $email = $params['email'];
    $maritalState = $params['maritalState'];
    $birthDate = $params['birthDate'];
    $bloodGroup = $params['bloodGroup'];
    $nationality = $params['nationality'];
    $gender = $params['gender'];
    $password = $params['password'];
    $pathology = $params['pathology'];
    
    if(isset($params['picture'])){
        $description = $params['description'];
    }else {
        $description = null;
    }
   
    if(isset($params['picture'])){
        $picture = $params['picture'];
    }else {
        $picture = null;
    }
    
    if($idPatient !== "0"){
    $query = "UPDATE `dainamic_db`.`Patient` "
            . "SET `name`='$name', `lastName`='$lastName', `numCc`='$numCc', `adress`='$adress', `numTel`='$numTel', "
            . " `nif`='$nif', `email`='$email', `maritalState`='$maritalState', `birthDate`='$birthDate', `bloodGroup`='$bloodGroup',"
            . " `nationality`='$nationality', `gender`='$gender', `password`='$password', `pathology`='$pathology',"
            . " `description`='$description', `picture`='$picture' WHERE `idPatient`='$idPatient'";
    }else{
    $query = "INSERT INTO `Patient` (`name`, `lastName`, `numCc`, `adress`, `numTel`, `nif`, `email`, "
            . "`maritalState`, `birthDate`, `bloodGroup`, `nationality`, `gender`, `password`, `pathology`, `description`,"
            . " `picture`, `idHealthProfessional`) "
            . "VALUES ('$name', '$lastName', '$numCc', '$adress', '$numTel', '$nif', '$email', '$maritalState', '$birthDate', "
            . "'$bloodGroup', '$nationality', '$gender', '$password', '$pathology', '$description', '$picture', '$idHealthProfessional');";
    }
    $result = mysql_query($query, $connection);
   
     if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = mysql_error($connection);
    } else {
        $response['cod'] = 300;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
}

