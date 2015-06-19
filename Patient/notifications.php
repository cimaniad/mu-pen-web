<<<<<<< HEAD
<<<<<<< HEAD
<?php
require_once '../headerPatient.php';
confirmPatient();
?>
<h1 class="help">Notificações</h1>
<br>
<p>O paciente possui uma sessão por realizar, siga as hiperligações para realizar os exercícios que lhe foram propostos pelo
    seu terapeuta.</p></br>
<p><a href="#">Treino de Memória(2)</a></p> 
<p><a href="#">Treino de Linguagem</a></p>
<p><a href="#">Treino de Atenção(3)</a></p> 
  </div>
</div>

<?php
require_once '../footer.php';
?>
=======
<?php
require_once '../headerPatient.php';
confirmPatient();
?>
<h1 class="help">Notificações</h1>
<br>
<p>O paciente possui uma sessão por realizar, siga as hiperligações para realizar os exercícios que lhe foram propostos pelo
    seu terapeuta.</p></br>
<p><a href="#">Treino de Memória(2)</a></p> 
<p><a href="#">Treino de Linguagem</a></p>
<p><a href="#">Treino de Atenção(3)</a></p> 
  </div>
</div>

<?php
require_once '../footer.php';
?>
>>>>>>> 71cc2afb78d1bb39a162356be60151c72c3e5107
=======
<?php
require_once '../Patient/headerPatient.php';
confirmPatient();
?>
   <link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
    <script src="../js/extra/datagrid/jquery.easyui.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-groupview.js"></script> 
<script src='../js/objectCallers/sessionCaller.js' type='text/javascript'></script> 
<input type="hidden" id="idPatientNot" value="<?=$_SESSION['idPatient']?>">
<h1 class="help">Sessões</h1>
<br>
</br>
<div id="supportThings"></div>
<div>
  <table id="dg" style="width:600px;height:250px">

    </table>
</div>	

  </div>
</div>

<?php
//require_once '../footer.php';
>>>>>>> 90f42c2bacc41c70544f67cb000b31fe74afef94
