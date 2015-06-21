<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function createEditNotification($params) {
    $id = $params['idNotification'];
    $idHealth = $params['idHealthProfessional'];
    $idPatient = $params['idPatient'];
    $isPationN = $params['isPatientN'];
    $saw = $params['saw'];
    $description = $params['description'];
    $connection = dbConnect();
    $response = array();

    if ($params['idAppointment'] != 0) {
        $idAppointment = $params['idAppointment'];

        $query = "INSERT INTO `dainamic_db`.`Notification`(`idAppointment`,`saw`,"
                . " `description`, `isPatientN`, `idPatient`, `idHealthProfessional`)"
                . " VALUES ('$idAppointment', '$saw', '$description', '$isPationN',"
                . " '$idPatient', '$idHealth')";
    } else if ($params['idSession'] != 0) {
        $idSession = $params['idSession'];
        $query = "INSERT INTO `dainamic_db`.`Notification`(`idSession`, `saw`, `description`, `isPatientN`, `idPatient`, `idHealthProfessional`) VALUES ('$idSession', '$saw', '$description', '$isPationN','$idPatient', '$idHealth');";
    } else if ($params['idComment'] != 0) {
        $idComment = $params['idComment'];
        $query = "INSERT INTO `dainamic_db`.`Notification`(`saw`, `description`, `isPatientN`, `idPatient`, `idHealthProfessional`,"
                . " `idComment`) VALUES ('$saw', '$description', '$isPationN',"
                . " '$idPatient', '$idHealth', '$idComment')";
    }

    $result = mysql_query($query, $connection);
    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = 'notification created with success';
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}

function getHPNotifications($params) {
    $idHP = $params['idHealthProfessional'];
    $connection = dbConnect();
    $response = array();
    /*    $query="SELECT * FROM Notification WHERE idAppointment IN "
      . "(SELECT idAppointment FROM Appointment WHERE idHealthProfessional=$idHP) OR idSession IN "
      . "(SELECT idSession FROM Appointment WHERE idHealthProfessional=$idHP);"; */
    $query = "SELECT * FROM Notification WHERE isPatientN=1 AND idHealthProfessional=$idHP";
    $result = mysql_query($query, $connection);
    if ($result) {
        while ($notification = mysql_fetch_array($result)) {
            $response[] = $notification;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 500;
    }

    mysql_close($connection);
    return $response;
}
