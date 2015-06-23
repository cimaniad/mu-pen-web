<?php
require_once '../session.php';
if(isset($_SESSION['idHealthProfessional'])){
require_once '../HealthProfessional/headerDP.php';
}else if(isset($_SESSION['idAdmin'])){
require_once '../Admin/headerAdmin.php';
}else if(isset($_SESSION['idPatient'])){
    require_once '../Patient/headerPatient.php';
}else {
    require_once '../Anon/header.php';
}

?>

<script>
    getInformation();
    </script>
<h1 style="color: #A30000;"><b> Informação Institucional</b></h1>
<select id='allInformation'>
    
</select>
<div id='titleInfo'></div>
<div id='contentInfo'></div>

