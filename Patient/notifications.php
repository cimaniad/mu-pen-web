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
  <table id="dg" title="Sessões" style="width:600px;height:250px">
<!--            data-options="
                singleSelect:true,
                collapsible:true,
                rownumbers:true,
                fitColumns:true,
                data:data,
                view:groupview,
                groupField:'session',
                groupFormatter:function(value,rows){
                    return value + ' - ' + rows.length + ' Item(s)';
                }
            ">-->
<!--        <thead>
            <tr>
                <th data-options="field:'session',width:80, hidden:true">Sessão</th>
                <th data-options="field:'name',width:100">Nome Exercício</th>
                <th data-options="field:'structure',width:80,align:'right'">Estrutura</th>
                <th data-options="field:'image',width:80,align:'right'">Imagem</th>
            </tr>
        </thead>-->
    </table>
</div>	
<!--<p>O paciente possui uma sessão por realizar, siga as hiperligações para realizar os exercícios que lhe foram propostos pelo
    seu terapeuta.</p></br>
<p><a href="#">Treino de Memória(2)</a></p> 
<p><a href="#">Treino de Linguagem</a></p>
<p><a href="#">Treino de Atenção(3)</a></p> -->
  </div>
</div>

<?php
//require_once '../footer.php';
