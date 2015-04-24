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
    if (isset($params['maritalState'])) {
        $maritalState = $params['maritalState'];
    } else {
        $maritalState = null;
    }

    if (isset($params['bloodGroup'])) {
        $bloodGroup = $params['bloodGroup'];
    } else {
        $bloodGroup = null;
    }
    $nacionality = $params['nacionality'];
    $gender = $params['gender'];
    $password = $params['password'];
    if (isset($params['picture'])) {
        $picture = $params['picture'];
    } else {
        $picture = null;
    }

    if (isset($params['institution'])) {
        $institution = $params['institution'];
    } else {
        $institution = null;
    }
    $developmentProfessional = $params['developmentProfessional'];

    $conn = dbConnect();
    $response = array();

    if ($idHealthProfessional !== "0") {

        $query = "UPDATE `dainamic_db`.`HealthProfessional` SET `name`='$name', "
                . "`lastName`='$lastName', `numCC`=$numCC, `adress`='$adress',"
                . " `numTel`=$numTel, `nif`=$nif, `email`='$email',  `maritalState`='$maritalState',"
                . " `birthDate`='$birthDate',`bloodGroup`='$bloodGroup', `nacionality`='$nacionality',"
                . " `gender`='$gender', `password`='$password',`picture`='$picture',"
                . "`institution`='$institution', `developmentProfessional`=$developmentProfessional "
                . "WHERE `idHealthProfessional`=$idHealthProfessional;";
    } else {
        $query = "INSERT INTO `dainamic_db`.`HealthProfessional` (`name`, `lastName`, `numCC`,"
                . " `adress`, `numTel`, `nif`, `email`, `maritalState`,"
                . " `birthDate`, `bloodGroup`, `nacionality`, `gender`, `password`,"
                . " `picture`, `institution`, `developmentProfessional`) VALUES"
                . " ('$name ', '$lastName', $numCC, '$adress', $numTel, $nif, '$email',"
                . " '$maritalState', '$birthDate', '$bloodGroup', '$nacionality', '$gender', '$password',"
                . "  '$picture', '$institution', $developmentProfessional)";
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

function getHealthProfessionalByName($params) {
    $name = $params['name'];
    $conn = dbConnect();
    $query = "SELECT * FROM HealthProfessional where name like '%$name%' or lastName like '%$name%'";
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

//$terapeuta['nome']=$resultado['nome'];
//$terapeuta['apelido']=$resultado['apelido'];
//$terapeuta['numCC']=$resultado['num_cc'];
//$terapeuta['morada']=$resultado['morada'];
//$terapeuta['numTel']=$resultado['num_tel'];
//$terapeuta['nif']=$resultado['nif'];
//$terapeuta['email']=$resultado['email'];
//$terapeuta['numUtente']=$resultado['num_utente'];
//$terapeuta['estadoCivil']=$resultado['estado_civil'];
//$terapeuta['dataNasc']=$resultado['data_nasc'];
//$terapeuta['grupoSang']=$resultado['grupo_sang'];
//$terapeuta['nacionalidade']=$resultado['nacionalidade'];
//$terapeuta['sexo']=$resultado['sexo'];
//$terapeuta['password']=$resultado['password'];
//$terapeuta['perfil']=$resultado['perfil'];
//$terapeuta['foto']=$resultado['foto'];
//$terapeuta['instituicao']=$resultado['instituicao'];
//$terapeuta['profissionalDesenvolvimento']=$resultado['profissionais_de_desenvolvimento'];
