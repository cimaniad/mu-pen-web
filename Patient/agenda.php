<?php
require_once 'headerPatient2.php';
confirmPatient();
?>

<link rel='stylesheet' href='../js/fullcalendar-2.3.1/fullcalendar.css' />
<script src='../js/fullcalendar-2.3.1/lib/jquery.min.js'></script>
<script src='../js/fullcalendar-2.3.1/lib/moment.min.js'></script>
<script src='../js/fullcalendar-2.3.1/fullcalendar.js'></script>
<script src='../js/fullcalendar-2.3.1/lang/pt.js'></script>



<script>appointmentsPatient();</script>
<h1 class="help">Agenda</h1>
</br>
<img src="../imagens/verde.jpg" width="70" height="17" alt="Erro"> <label>Consultas aprovadas</label></br>
<img src="../imagens/azul.jpg" width="70" height="17" alt="Erro"> <label>Consultas ainda não aprovadas pelo Profissional de Saúde</label></br>
<img src="../imagens/vermelho.jpg" width="70" height="17" alt="Erro"> <label>Consultas ainda não aprovadas nem pelo Paciente nem pelo Profissional de Saúde</label>
<input type="hidden" id="agendaIdPatient" value="<?=$_SESSION['idPatient']?>"/>
<div id='calendar'></div>
</div>
</div>
<?php
include '../footer.php';
?>