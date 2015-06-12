<?php
include 'headerPatient.php';
confirmPatient();
if(!isset($_GET['id'])){
    redirect('../redirectUser.php');
}else {
?>

<h1 class="help">Visualizar Consulta</h1>
<script>
    appointmentById();
    healthProfessionalName();
    </script>

        <input type='hidden' id="healthProfessionalPatient" value="<?=$_SESSION['healthProfessional']?>">
        <input type="hidden" id="idAppointmentConfig" value="<?=$_GET['id']?>">
        <input type="hidden" id="idPatientConfig">
        <input type="hidden" id="healthProfessionalApprovalConfig">
        <b>Data: </b><span id="dateConfig"></span></br>
        </br>
        <b class="hora">Hora: </b><span id='hourConfig'></span>
        </br>
        </br> 
        <b>Local: </b> <span id='localConfig'></span>
        </br>
        </br> 
        <b>Terapeuta: </b> <span id="healthProfessionalName"></span> 
        </br>
        </br>       
        <b>Descrição: </b> <span id='descriptionConfig'></span>
      
        </br>
 <?php
 if($_GET['status'] == 'false'){
 ?>
    <input class="submit1" type="button" value="Aprovar Consulta" id='approveSchedule'>
    <input class="submit2" type="button" value="Cancelar Consulta" id="cancelAppointment"/>
<?php    
 }
?>
</div>
</div>

<?php
require_once '../footer.php';
}
?>

    

    