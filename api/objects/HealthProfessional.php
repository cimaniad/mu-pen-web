<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

/**
 * Method to save the HealthProfessional in the database
 *
 * @param type $params
 * @return type
 */
function saveEditHealthProfessional($params) {
    $idHealthProfessional = $params['idHealthProfessional'];
    $name = $params['name'];
    $lastName = $params['lastName'];
    $numCC = $params['numCC'];
    if (isset($params['adress'])) {
        $adress = $params['adress'];
    } else {
        $adress = null;
    }
    $numTel = $params['numTel'];
    $nif = $params['nif'];
    $email = $params['email'];
    $birthDate = $params['birthDate'];
    if (isset($params['maritalStatus'])) {
        $maritalStatus = $params['maritalStatus'];
    } else {
        $maritalStatus = null;
    }

    if (isset($params['bloodGroup'])) {
        $bloodGroup = $params['bloodGroup'];
    } else {
        $bloodGroup = null;
    }
    $nationality = $params['nationality'];
    $gender = $params['gender'];
    $password = $params['password'];
    if (isset($params['institution'])) {
        $institution = $params['institution'];
    } else {
        $institution = null;
    }
    $developmentProfessional = $params['developmentProfessional'];

    if ($params['picture'] != "profile") {
        $picture = $params['picture'];
        $pictureName = $numCC . ".jpg";
        $filePath = dirname(__FILE__) . "/../images/HealthProfessionals/" . $pictureName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $file = fopen($filePath, "w");
        file_put_contents($filePath, base64_decode($picture));
        $pictureName = "http://dainamic.dsi.uminho.pt/api/images/HealthProfessionals/".$pictureName;
    } else {
        $pictureName = $params['picture'];
    }

    $conn = dbConnect();
    $response = array();

    if ($idHealthProfessional !== "0") {

        $query = "UPDATE `dainamic_db`.`HealthProfessional` SET `name`='$name', "
                . "`lastName`='$lastName', `numCC`=$numCC, `adress`='$adress',"
                . " `numTel`=$numTel, `nif`=$nif, `email`='$email',  `maritalStatus`='$maritalStatus',"
                . " `birthDate`='$birthDate',`bloodGroup`='$bloodGroup', `nationality`='$nationality',"
                . " `gender`='$gender', `password`='$password',`picture`='$pictureName',"
                . "`institution`='$institution', `developmentProfessional`=$developmentProfessional "
                . "WHERE `idHealthProfessional`=$idHealthProfessional;";
    } else {
        $query = "INSERT INTO `dainamic_db`.`HealthProfessional` (`name`, `lastName`, `numCC`,"
                . " `adress`, `numTel`, `nif`, `email`, `maritalStatus`,"
                . " `birthDate`, `bloodGroup`, `nationality`, `gender`, `password`,"
                . " `picture`, `institution`, `developmentProfessional`) VALUES"
                . " ('$name ', '$lastName', $numCC, '$adress', $numTel, $nif, '$email',"
                . " '$maritalStatus', '$birthDate', '$bloodGroup', '$nationality', '$gender', '$password',"
                . "  '$pictureName', '$institution', $developmentProfessional)";
    }

    $result = mysql_query($query, $conn);

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = mysql_error($conn);
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    mysql_close($conn);

    return $response;
}

function getHealthProfessionalById($params) {
    $id = $params['idHealthProfessional'];

    $conn = dbConnect();
    $query = "SELECT * FROM HealthProfessional WHERE idHealthProfessional=$id";
    $result = mysql_query($query, $conn);
    $response = array();

    if ($result) {
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}

function searchHealthProfessional($params) {
    if (isset($params['name'])) {
      $name = $params['name'];
      $splitedName=explode(" ", $name);

      if(count($splitedName)===1){
        $query = "SELECT * FROM HealthProfessional where name like '%$name%' or lastName like '%$name%'";
      }else{
        $firstName=$splitedName[0];
        $lastName=$splitedName[1];
        $query = "SELECT * FROM HealthProfessional where name like '%$firstName%' or lastName like '%$lastName%'";
      }
    }else{
      $numTel=$params['numTel'];
      $query="SELECT * FROM HealthProfessional where numTel=$numTel";
    }

    $conn = dbConnect();
    $result = mysql_query($query, $conn);
    $response = array();

    if ($result) {
        while ($healthPro = mysql_fetch_array($result)) {
            $response[] = $healthPro;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}

function getAllHealthProfessionals($params) {
    $conn = dbConnect();
    $query = "SELECT * FROM HealthProfessional";
    $result = mysql_query($query, $conn);
    $response = array();

    if ($result) {
        while ($healthPro = mysql_fetch_array($result)) {
            $response[] = $healthPro;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}

function deleteHealthProfessional($params) {
    $id = $params['idHealthProfessional'];

    $conn = dbConnect();
    $query = "DELETE FROM HealthProfessional WHERE idHealthProfessional=$id";
    $result = mysql_query($query, $conn);
    $response = array();

    if ($result) {
        $response['cod'] = 200;
        $response['error'] = TRUE;
        $response['msg'] = "HealthProfessional deleted with sucess";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    return $response;
}
