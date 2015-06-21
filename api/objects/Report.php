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

