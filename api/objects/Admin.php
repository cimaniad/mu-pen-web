<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function editAdmin($params){
    $idAdmin = $params['idAdmin'];
    $name = $params['name'];
    $password = $params['password'];
    $numCC = $params['numCC'];
    $email = $params['email'];
    $birthDate = $params['birthDate'];
    $nationality = $params['nationality'];
    $address = $params['address'];
    $numTel = $params['numTel'];
    $bloodGroup = $params['bloodGroup'];
     if (isset($params['picture'])) {
        $picture = $params['picture'];
    } else {
        $picture = null;
    }
    
    $conn = dbConnect();
    $response = array();
    
    $query = "UPDATE `Admin` SET `name`='$name', `password`='$password', `email`='$email', `numCC`='$numCC', "
            . "`birthDate`='$birthDate', `nacionality`='$nationality', `adress`='$address', `numTel`='$numTel', "
            . "`bloodGroup`='$bloodGroup', `picture`='$picture' WHERE `idAdmin`='$idAdmin'";
    
     $result = mysql_query($query, $conn);
     
    if ($result) {
        $response['cod'] = 200;
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
