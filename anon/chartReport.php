<?php
require_once '../session.php';
if(isset($_SESSION['idHealthProfessional'])){
    require_once '../HealthProfessional/headerDP.php';
}else {
    require_once 'headeranon.php';    
}
?>
 <script src="../js/extra/highCharts/js/highcharts.js"></script>
<script src="../js/extra/highCharts/js/modules/data.js"></script>
<script src="../js/extra/highCharts/js/modules/exporting.js"></script>
<script type="text/javascript" src="../js/objectCallers/Report.js"></script>

<?php
if($_GET['id'] == 1){
    ?>

<script>getStatistics();</script>
<?php
}
?>
<div id="chartContent" ></div>

	

