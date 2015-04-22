<?php
include_once 'ApiCaller.php';
if(isset($_POST['submit'])){
  $api_url='http://localhost/NEP-UM-WEB/api/';
  
  $parametros= array(
    'objeto'=> 'instituicao',
    'funcao'=>'registar_instituicao',
    'contacto'=>$_POST['contacto']
);
  
$resposta=enviar_pedido($api_url,$parametros);
echo json_encode($resposta);
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Registar Instituição</title>
    </head>
    <body>
        <form method="post">
            <input type="text" name="contacto">
            <input type="submit" name="submit">
        </form>
    </body>
</html>       