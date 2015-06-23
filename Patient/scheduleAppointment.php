<?php
include 'headerPatient.php';
confirmPatient();
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="../css/timepicker.css">

  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="../js/extra/timepicker/timepicker.js"></script>
  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd"});
    $("#scheduleHour").timepicker({ hourText: 'Horas',
                                    minuteText: 'Minutos',
                                    showPeriodLabels: false,
                                    hours:{
                                        starts: 08,
                                        ends: 19
                                    }
                                    });
  });
  </script>
 <?php 
 if(isset($_GET['id'])){
     ?>
        <input type="hidden" value="<?=$_GET['id']?>" id="idAppointmentCreating">
  <?php
 }else {
     ?>
          <input type="hidden" value="0" id="idAppointmentCreating">
 <?php
 }
 ?>
  <input type="hidden" id="idPatientName" value="<?=$_SESSION['name']?>">
  <input type="hidden" id="idPatientLastName" value="<?=$_SESSION['lastName']?>">
  <h1 class="help"><b> Marcar Consulta</b></h1>
</br>
    </br>
<form method="post">
    <div class="consulta">
         <script>healthProfessionalName();
                onlyLettersNumbers('#scheduleDescription');</script>
        <b>Data: </b>
        <input id="datepicker" class="data" required>
        
        <b class="hora">Hora: </b>
        <input id="scheduleHour" required>
        </br>
        </br>
        <b>Profissional de Saúde: </b> <span id="healthProfessionalName"></span>
            <input type="hidden" id="healthProfessionalPatient" value="<?=$_SESSION['healthProfessional']?>">
        </br>
        </br>
            <input type="hidden" id="idPatientSchedule" value="<?=$_SESSION['idPatient']?>"/>
        <b>Descrição:</b>
        <label><div class="mens_cont">    
        <textarea class="contact textarea" rows="7" id="scheduleDescription" cols="35" required></textarea> </label></div>
        <input class="submit1" type="submit" value="Cancelar"/>        
        <input class="submit2" type="button" value="Marcar Consulta" id="scheduleAppointment">

    
</div>
    </form>
</div>
</div>

<?php
require_once '../footer.php';
?>

    

    
    
    

