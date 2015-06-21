<?php
require_once '../Patient/headerPatient.php';
confirmPatient();
?>
<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
<script src="../js/extra/datagrid/jquery.easyui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="http://www.jeasyui.com/easyui/datagrid-groupview.js"></script> 
<script src='../js/objectCallers/sessionCaller.js' type='text/javascript'></script> 
<input type="hidden" id="idPatientNot" value="<?= $_SESSION['idPatient'] ?>">
<script>getNotification();</script>
<h1 class="help">Sessões</h1>
<br>
</br>
<div id="supportThings"></div>
<div>
    <table id="dg" style="width:600px;height:250px">

    </table>
</div>
</div>
</br>
<?php
require_once '../footer.php';
