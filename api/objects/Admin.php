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
