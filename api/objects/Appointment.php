<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function saveEditAppointment($params) {
    $id = $params['idAppointment'];
    $idHealth = $params['idHealthProfessional'];
    $idPatient = $params['idPatient'];
    $date = $params['date'];
    $hour = $params['hour'];
    $local = $params['local'];
    $patientApproval = $params['patientApproval'];
    $healthProfessionalApproval = $params['healthProfessionalApproval'];
    $description = $params['description'];
    $connection = dbConnect();
    $response = array();
    if ($id !== "0") {
        $query = "UPDATE `Appointment` SET `date`='$date', `hour`='$hour', `local`='$local',`patientApproval`=$patientApproval,"
                . "`healthProfessionalApproval`=$healthProfessionalApproval, `description`='$description',"
                . "`idHealthProfessional`='$idHealth', `idPatient`='$idPatient' WHERE `idAppointment`='$id'";
    } else {
        $query = "INSERT INTO `Appointment` (`date`, `hour`, `local`,`patientApproval`,`healthProfessionalApproval`,"
                . " `description`, `idHealthProfessional`, `idPatient`) "
                . "VALUES ('$date', '$hour', '$local',$patientApproval,$healthProfessionalApproval, '$description', '$idHealth', '$idPatient')";
    }
    $result = mysql_query($query, $connection);
    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = mysql_insert_id();
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}

function getHPAppointments($params) {
    $idHealth = $params['idHealthProfessional'];
    $connection = dbConnect();
    $query = "Select * From Appointment Where idHealthProfessional='$idHealth'";
    $result = mysql_query($query, $connection);
    $response = array();
    if ($result) {
        while ($appointments = mysql_fetch_array($result)) {
            $response[] = $appointments;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Health Professional does not have Appointments";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getAppointmentById($params) {
    $idAppointment = $params['idAppointment'];
    $connection = dbConnect();
    $query = "Select * From Appointment Where idAppointment='$idAppointment'";
    $result = mysql_query($query, $connection);
    $response = array();
    if (mysql_num_rows($result) === 1) {
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Appointment does not exist";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getAppointmentByIdHPDate($params) {
    $idHealth = $params['idHealthProfessional'];
    $date = $params['dateAppointment'];
    $connection = dbConnect();
    $query = "Select * From Appointment Where idHealthProfessional='$idHealth' and date='$date'";
    $result = mysql_query($query, $connection);
    $response = array();
    if ($result) {
        while ($appointments = mysql_fetch_array($result)) {
            $response[] = $appointments;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Appointment does not exist";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getAppointmentsByPatient($params) {
    $patient = $params['idPatient'];
    $connection = dbConnect();
    $query = "Select * From Appointment Where idPatient='$patient'";
    $result = mysql_query($query, $connection);
    $response = array();
    if ($result) {
        while ($appointments = mysql_fetch_array($result)) {
            $response[] = $appointments;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Error";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}
