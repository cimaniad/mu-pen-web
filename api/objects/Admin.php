<?php


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../db/DbConn.php';


function getAdminById($params) {
    $id = $params['idAdmin'];
    $conn = dbConnect();
    $query = "SELECT * FROM Admin WHERE idAdmin=$id";
    $result = mysql_query($query, $conn);
    $response = array();
    if (mysql_num_rows($result) === 1) {
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
    } else {
        $response['msg'] = "Patient does not exist";
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($conn);
    return $response;
}
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
            . "`birthDate`='$birthDate', `nationality`='$nationality', `adress`='$address', `numTel`='$numTel', "
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
