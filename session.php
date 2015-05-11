<?php

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    $url = 'index.php';
    header("Location: $url");
}

if (isset($_GET['idAdmin'])) {
    $email = $_GET['email'];
    $id = $_GET['idAdmin'];
    $name = $_GET['name'];
    $_SESSION['email'] = $email;
    $_SESSION['idAdmin'] = $id;
    $_SESSION['name'] = $name;  
} elseif(isset($_GET['idPatient'])){
    $email = $_GET['email'];
    $id = $_GET['idPatient'];
    $name = $_GET['name'];
    $_SESSION['email'] = $email;
    $_SESSION['idPatient'] = $id;
    $_SESSION['name'] = $name;  
} elseif(isset($_GET['idHealthProfessional'])){
    $email = $_GET['email'];
    $id = $_GET['idHealthProfessional'];
    $name = $_GET['name'];
    $_SESSION['email'] = $email;
    $_SESSION['idHealthProfessional'] = $id;
    $_SESSION['name'] = $name; 
}
//function validateLogin($email, $password) {
//    require_once dirname(__FILE__) . '/ApiCaller.php';
//    $params = array(
//        'object' => 'Admin',
//        'function' => 'validateLogin',
//        'email' => $email,
//        'password' => $password
//    );
//
//    $responseJson = send_request($params);
//    $response = json_decode($responseJson, TRUE);
//    if ($response['cod'] === 200) {
//        session_start();
//        $_SESSION['idAdmin'] = $response['idAdmin'];
//        $_SESSION['email'] = $response['email'];
//        $_SESSION['name'] = $response['name'];
//        $url = 'index_teste.php';
//        header("Location: $url");
//    } else {
//        if ($response['cod'] === 401) {
//            echo "<script>window.alert('Password incorreta');</script>";
//        } else if ($response['cod'] === 400) {
//            $msg = $response['msg'];
//            $cod = $response['cod'];
//            echo "<h1 style='color:red'>$cod</h1>";
//            echo "<h1 style='color:red'>$msg</h1>";
//        } else if ($response['cod'] === 404) {
//            echo "<script>window.alert('e-mail incorreto');</script>";
//        }
//    }
//}

function confirm_admin() {
    if (!isset($_SESSION['idAdmin'])) {
        redirect('redirectUser.php');
    }
}

function confirmPatient(){
    if(!isset($_SESSION['idPatient'])){
        redirect('redirectUser.php');
    }
}

function confirmHealthProfessional(){
    if(!isset($_SESSION['idHealthProfessional'])){
        redirect('redirectUser.php');
    }
}

function redirect($url){
       header("Location: $url");
}

