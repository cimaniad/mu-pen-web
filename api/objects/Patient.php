<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getPatientById($params) {
    $id = $params['idPatient'];
    $connection = dbConnect();
    $query = "Select * From Patient Where idPatient='$id'";
    $result = mysql_query($query, $connection);
    $response = array();
    if (mysql_num_rows($result) === 1) {
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Patient does not exist";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getPatientsByHealthProfessional($params) {
    $id = $params['idHealthProfessional'];
    $connection = dbConnect();
    $query = "Select * From Patient Where idHealthProfessional='$id'";
    $result = mysql_query($query, $connection);
    $response = array();
    if ($result) {
        while ($patients = mysql_fetch_array($result)) {
            $response[] = $patients;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Health Professional does not have Patients";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getPatientByName($parms) {
    $name = $params['name'];
    $conn = dbConnect();
    $query = "SELECT * FROM Patient where name like '%$name%' or lastName like '%$name%'";
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

function getPatientsByHPDate($parms) {
    $idHelthProfessional = $parms['idHealthProfessional'];
    $appointmDate = $parms['appointmentDate'];
    $response = array();
    $conn = dbConnect();
    $query = "select * FROM Patient WHERE idHealthProfessional=$idHelthProfessional AND idPatient"
            . " IN (select idPatient from Appointment where date='$appointmDate')";
    $result = mysql_query($query, $conn);

    if ($result) {
        while ($patient = mysql_fetch_array($result)) {
            $response[] = $patient;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = mysql_error($conn);
        $response['error'] = TRUE;
        $response['cod'] = 500;
    }
    return $response;
}

function saveEditPatient($params) {
    $idPatient = $params['idPatient'];
    $idHealthProfessional = $params['idHealthProfessional'];
    $name = $params['name'];
    $lastName = $params['lastName'];
    $numCc = $params['numCC'];
    $adress = $params['adress'];
    $numTel = $params['numTel'];
    $nif = $params['nif'];
    $email = $params['email'];
    $maritalStatus = $params['maritalStatus'];
    $birthDate = $params['birthDate'];
    $bloodGroup = $params['bloodGroup'];
    $nationality = $params['nationality'];
    $gender = $params['gender'];
    $password = $params['password'];
    $pathology = $params['pathology'];

    if (isset($params['description'])) {
        $description = $params['description'];
    } else {
        $description = null;
    }

    if ($params['picture'] != "profile") {
        $picture = $params['picture'];
        $pictureName = $numCc . ".jpg";
        $filePath = dirname(__FILE__) . "/../../imagens/Patients/" . $pictureName;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $file = fopen($filePath, "w");
        file_put_contents($filePath, base64_decode($picture));
    } else {
        $pictureName = $params['picture'];
    }
    $connection = dbConnect();
    $response = array();
    if ($idPatient !== "0") {
        $query = "UPDATE `dainamic_db`.`Patient` "
                . "SET `name`='$name', `lastName`='$lastName', `numCc`='$numCc', `adress`='$adress', `numTel`='$numTel', "
                . " `nif`='$nif', `email`='$email', `maritalStatus`='$maritalStatus', `birthDate`='$birthDate', `bloodGroup`='$bloodGroup',"
                . " `nationality`='$nationality', `gender`='$gender', `password`='$password', `pathology`='$pathology',"
                . " `description`='$description', `picture`='$pictureName' WHERE `idPatient`='$idPatient'";
    } else {
        $query = "INSERT INTO `Patient` (`name`, `lastName`, `numCc`, `adress`, `numTel`, `nif`, `email`, "
                . "`maritalStatus`, `birthDate`, `bloodGroup`, `nationality`, `gender`, `password`, `pathology`, `description`,"
                . " `picture`, `idHealthProfessional`) "
                . "VALUES ('$name', '$lastName', '$numCc', '$adress', '$numTel', '$nif', '$email', '$maritalStatus', '$birthDate', "
                . "'$bloodGroup', '$nationality', '$gender', '$password', '$pathology', '$description', '$pictureName', '$idHealthProfessional');";
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
