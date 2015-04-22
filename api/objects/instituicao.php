<?php

require_once '../api/base_dados/mysql_conexao.php';

function registar_instituicoes($parametros) {
    $conexao = ligar_base_dados();
    $nome = $parametros['nome'];
    $morada = $parametros['morada'];
    $distrito = $parametros['distrito'];
    $concelho = $parametros['concelho'];
    $codigoPostal= $parametros['codigoPostal'];
    $telefone = $parametros['telefone'];
    $estacionamentoPublico= $parametros['estacionamentoPublico'];
    $email = $parametros['email'];
    $diretor = $parametros['diretor'];
    $url = $parametros['url'];
    $query = "INSERT INTO `dainamic_db`.`instituicao` (`nome`, `morada`, `distrito`,"
            . " `concelho`, `cod_postal`, `telefone`, `estacionamento_publico`, `email`,"
            . " `diretor`, `url`) VALUES ('$nome', '$morada', '$distrito', '$concelho',"
            . " '$codigoPostal', $telefone, '1', '$email', '$diretor', '$url');";
    $resultado = mysql_query($query, $conexao);
    $validacao = validar($resultado);
   
    mysql_close($conexao);
    return json_encode($validacao);
}

function listar_instituicoes(){
    $conexao = ligar_base_dados();
    $query = "SELECT * FROM instituicao";
    $resultado = mysql_query($query, $conexao);
    $validacao= validar($resultado);
    $instituicoes = array();
    while($intituicao = mysql_fetch_assoc($resultado)){
        $instituicoes[]=$intituicao;
    }
    $retorno['dados']=$validacao;
    $retorno['instituicoes']=$instituicoes;
    
    return json_encode($retorno, true);
    
}