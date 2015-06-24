<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function getRequest($params){
    if($params['type']=='SessionReport'){
        ?>
<input type="hidden" id="idSession" value="<?=$params['idSession']?>">
<script type="text/javascript" src="../../js/objectCallers/Report.js"></script>
<script> getSessionReport($('#idSession').val());</script>
<?php
    }
}

function getStatistics($params){
    $connection = dbConnect();
    $response = array();
    $query = "Select * From HealthProfessional";
    $query1 = "Select * From HealthProfessional Where developmentProfessional = 1";
    $query2= "Select * From Patient";
    $result = mysql_query($query, $connection);
    $result1 = mysql_query($query1, $connection);
    $result2 = mysql_query($query2, $connection);
    if($result){
    $response['healthProfessionals'] = mysql_num_rows($result);
        if($result1){
          $response['development'] = mysql_num_rows($result1);
        }if($result2){
            $response['patients'] = mysql_num_rows($result2);
        }
    $response['cod'] = 200;
    }else{
        $response['cod'] = 404;
    }
    mysql_close($connection);

    return $response;    
}