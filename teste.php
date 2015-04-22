<?php
require_once '../api/objetos/administrador.php';

//$parametros = array(
//    'objeto' => 'administrador',
//    'funcao' => 'get_admin'
//);
//$api_url = "http://localhost/NEP-UM-WEB/api/";
//$resposta = enviar_pedido($api_url, $parametros);
//echo json_encode($resposta);

$admin = get_admin();
while ($ad = mysql_fetch_array($admin)){
    echo $ad['nome'];
}
?>

