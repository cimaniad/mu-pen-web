<?php
include 'header.php';
require_once 'sessao.php';

 require_once dirname(__FILE__) . '/ApiCaller.php';
    $params = array(
        'object' => 'Patient',
        'function' => 'getPatient',
        'idPatient' => '1'
    );

    $responseJson = send_request($params);
    $response = json_decode($responseJson, TRUE);
    

?>
<h1 style="color: #A30000;"><b> Perfil Pessoal</b></h1>

<p><span>Nome do Cliente: </span><?= $response['name'].' '.$response['lastName']?></p><img src="./imagens/perfil.jpeg" alt="Erro" class="merp" width="125px" height="100px">
<p><span>Data de Nascimento: </span><?= $response['birthDate']?></p>
<p><span>Sexo: </span> <?=$response['gender']?> </p>
<p><span>NIF: </span> <?=$response['nif']?></p>
<p><span>Morada:</span> <?=$response['adress']?></p>
<p><span>Email: </span> <?=$response['email']?></p>
<p><span>Nº Telefone: </span> <?=$response['numTel']?></p>
<p><span>NºCC: </span> <?=$response['numCc']?></p>
<p><span>NºUtente: </span> 6465</p>
<p><span>Estado Civil: </span> <?=$response['maritalState']?></p>
<p><span>Nacionalidade:</span> <?=$response['nationality']?></p>
<p><span>Grupo Sanguineo: </span> <?=$response['bloodGroup']?></p>
<p><span>Patologia: </span> <?=$response['pathology']?></p>

          
  </div>
</div>
<?php
include 'footer.php';
?>
