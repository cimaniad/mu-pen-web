<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getHPNotifications($params){
    $idHP = $params['idHelathProfessional'];
    $connection = dbConnect();
    $query="SELECT * FROM Notification WHERE idAppointment IN "
            . "(SELECT idAppointment FROM Appointment WHERE idHealthProfessional=$idHP) OR idSession IN "
            . "(SELECT idSession FROM Appointment WHERE idHealthProfessional=$idHP);";
  
    $result = mysql_query($query, $connection);

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = 'appointement created with success';
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
    
}