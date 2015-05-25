<?php
require_once 'session.php';

if(isset($_SESSION['idAdmin'])){
    redirect('Admin/headerAdmin.php');
}elseif (isset($_SESSION['idPatient'])){
    redirect('Patient/headerPatient.php');
}elseif (isset($_SESSION['idHealthProfessional'])){
    redirect('HealthProfessional/headerDP.php');
}else {
    redirect('login.php');
}