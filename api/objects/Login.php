<?php
      require_once 'sendMail.php';
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
    $query1 = "SELECT * FROM Admin WHERE email='$email'";
    $result1 = mysql_query($query1, $conn) or die(mysql_error());
    $query2 = "SELECT * FROM Patient WHERE email='$email'";
    $result2 = mysql_query($query2, $conn) or die(mysql_error());
    $query3 = "SELECT * FROM HealthProfessional WHERE email='$email'";
    $result3 = mysql_query($query3, $conn) or die(mysql_error());
    if (mysql_num_rows($result1) === 1) {
        $fetch = mysql_fetch_array($result1);
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
    } elseif (mysql_num_rows($result2) === 1){
         $fetch = mysql_fetch_array($result2);
         $dbPass = $fetch['password'];
         $idPatient = $fetch['idPatient'];
         $name = $fetch['name'];
         $email = $fetch['email'];
         $healthProfessional = $fetch['idHealthProfessional'];
         if ($dbPass == $pass) {
            $response['msg'] = "validation success";
            $response['error'] = FALSE;
            $response['idPatient'] = $idPatient;
            $response['name'] = $name;
            $response['email'] = $email;
            $response['healthProfessional'] = $healthProfessional;
            $response['cod'] = 200;
        } else {
            $response['msg'] = "validation fail";
            $response['error'] = TRUE;
            $response['cod'] = 401;
        }

    } elseif (mysql_num_rows($result3) === 1){
       $fetch = mysql_fetch_array($result3);
       $dbPass = $fetch['password'];
       $idHealthProfessional = $fetch['idHealthProfessional'];
       $name = $fetch['name'];
       $email = $fetch['email'];
      $developmentProfessional = $fetch['developmentProfessional'];
         if ($dbPass == $pass) {
            $response['msg'] = "validation success";
            $response['error'] = FALSE;
            $response['idHealthProfessional'] = $idHealthProfessional;
            $response['name'] = $name;
            $response['email'] = $email;
            $response['developmentProfessional'] = $developmentProfessional;  
            $response['cod'] = 200;
        } else {
            $response['msg'] = "validation fail";
            $response['error'] = TRUE;
            $response['cod'] = 401;
        }

     }else {
        $response['msg'] = "User does not exist";
        $response['error'] = TRUE;
        $response['lines'] = mysql_num_rows($result);
        $response['cod'] = 404;
        }

//    mysql_free_result($result1);
    mysql_close($conn);
    return $response;
}

function getPassword($params){
    $email = $params['email'];
    $numCc = $params['numCc'];
    
    $connection = dbConnect();
    $response = array();
    
    $query1 = "Select password From Admin Where email = '$email' and numCc = '$numCc'";
    $result1 = mysql_query($query1, $connection) or die(mysql_error());
    $query2 = "Select password From HealthProfessional Where email = '$email' and numCc = '$numCc'";
    $result2 = mysql_query($query2, $connection) or die(mysql_error());
    $query3 = "Select password From Patient Where email = '$email' and numCc = '$numCc'";
    $result3 = mysql_query($query3, $connection) or die(mysql_error());
    
    if(mysql_num_rows($result1) === 1){
       $fetch = mysql_fetch_array($result1);
       $response['password'] = $fetch['password'];
       $response['error'] = FALSE;
       $response['cod'] = 200;
       $name = '';
       $subject = 'Recuperar Password';
       $message = 'A sua Password é '.$response['password'];
       sendMail($email, $name, $subject, $message);
   } else if(mysql_num_rows ($result2) === 1){
       $fetch = mysql_fetch_array($result2);
       $response['password'] = $fetch['password'];
       $response['error'] = FALSE; 
       $response['cod'] = 200;
       $name = '';
       $subject = 'Recuperar Password';
       $message = 'A sua Password é '.$response['password'];
       sendMail($email, $name, $subject, $message);       
    }else if(mysql_num_rows($result3) === 1){
       $fetch = mysql_fetch_array($result3);
       $response['password'] = $fetch['password'];
       $response['error'] = FALSE; 
       $response['cod'] = 200;
       $name = '';
       $subject = 'Recuperar Password';
       $message = 'A sua Password é '.$response['password'];
       sendMail($email, $name, $subject, $message);       
    }else {
       $response['error'] = TRUE;
       $response['msg'] = mysql_error($connection);
       $response['cod'] = 404;
    }
    
    mysql_close($connection);
    return $response;
}