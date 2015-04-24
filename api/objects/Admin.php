<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once dirname(__FILE__) . '/../db/DbConn.php';

function validateLogin($params) {
    $response = array();
    $email = $params['email'];
    $pass = $params['password'];

    $conn = dbConnect();
    $query = "SELECT * FROM Admin WHERE email='$email'";
    $result = mysql_query($query, $conn) or die(mysql_error());


    if (mysql_num_rows($result) === 1) {
        $fetch = mysql_fetch_array($result);
        $dbPass = $fetch['password'];
        $idAdmin = $fetch['idAdmin'];
        $name = $fetch['name'];
        $email = $fetch['email'];
        if ($dbPass == $pass) {
            $response['msg'] = "validation success";
            $response['error'] = FALSE;
            $response['idAdmin'] = $idAdmin;
            $response['name'] = $name;
            $response['email'] = $email;
            $response['cod'] = 200;
        } else {
            $response['msg'] = "validation fail";
            $response['error'] = TRUE;
            $response['cod'] = 401;
        }
    } else {
        $response['msg'] = "Admin does not exist";
        $response['error'] = TRUE;
        $response['lines'] = mysql_num_rows($result);
        $response['cod'] = 404;
    }
    mysql_free_result($result);
    mysql_close($conn);
    return $response;
}
