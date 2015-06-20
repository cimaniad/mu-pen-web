<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getHPNotifications($params){
    $idHP = $params['idHealthProfessional'];
    $connection = dbConnect();
    $response = array();
/*    $query="SELECT * FROM Notification WHERE idAppointment IN "
            . "(SELECT idAppointment FROM Appointment WHERE idHealthProfessional=$idHP) OR idSession IN "
            . "(SELECT idSession FROM Appointment WHERE idHealthProfessional=$idHP);";*/
    $query= "SELECT * FROM Notification WHERE isPatientN=1 AND idHealthProfessional=$idHP";
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
