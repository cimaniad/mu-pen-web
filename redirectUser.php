<?php
require_once 'session.php';

if(isset($_SESSION['idAdmin'])){
    redirect('anon/index.php');
}elseif (isset($_SESSION['idPatient'])){
    redirect('anon/index.php');
}elseif (isset($_SESSION['idHealthProfessional'])){
    redirect('anon/index.php');
}else {
    redirect('anon/index.php');
}