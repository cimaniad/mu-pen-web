<?php
require_once 'session.php';

if(isset($_SESSION['idAdmin'])){
    redirect('headerAdmin.php');
}elseif (isset($_SESSION['idPatient'])){
    redirect('headerPatient.php');
}elseif (isset($_SESSION['idHealthProfessional'])){
    redirect('headerDP.php');
}else {
    redirect('login.php');
}