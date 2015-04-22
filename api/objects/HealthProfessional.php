<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

/**
 * Method to save the HealthProfessional in the database
 * 
 * @param type $params
 * @return type
 */
function saveEditHealthProfessional($params) {
    $name = $params['name'];
    $lastName = $params['lastName'];
    $numCC = $params['numCC'];

    if (isset($params['adress'])) {
        $adress = $params['adress'];
    } else {
        $adress = null;
    }

    $numTel = $params['numTel'];
    $nif = $params['nif'];
    $email = $params['email'];

    if (isset($params['maritalState'])) {
        $maritalState = $params['maritalState'];
    } else {
        $maritalState = null;
    }
    if (isset($params['birthDate'])) {
        $birthDate = $params['birthDate'];
    } else {
        $birthDate = null;
    }
    if (isset($params['bloodGroup'])) {
        $bloodGroup = $params['bloodGroup'];
    } else {
        $bloodGroup = null;
    }

    $nacionality = $params['nacionality'];
    $gender = $params['gender'];
    $password = $params['password'];
    $profile = $params['profile'];
    $picture = $params['picture'];

    if (isset($params['institution'])) {
        $institution = $params['institution'];
    } else {
        $institution = null;
    }

    $developmentProfessional = $params['developmentProfessional'];

    $conn = dbConnect();
    $response = array();

    
    if (isset($params['idHealthProfessional'])) {

        $idHealthProfessional = $params['idHealthProfessional'];
        echo $idHealthProfessional;
        $query = "UPDATE `dainamic_db`.`HealthProfessional` SET `name`='$name', "
                . "`lastName`='$lastName', `numCC`=$numCC, `adress`='$adress',"
                . " `numTel`=$numTel, `nif`=$nif, `email`='$email',  `maritalState`='$maritalState',"
                . " `birthDate`='$birthDate',`bloodGroup`='$bloodGroup', `nacionality`='$nacionality',"
                . " `gender`='$gender', `password`='$password', `profile`='$profile',`picture`='$picture',"
                . "`institution`='$institution', `developmentProfessional`=$developmentProfessional "
                . "WHERE `idHealthProfessional`=$idHealthProfessional;";
    } else {
        $query = "INSERT INTO `dainamic_db`.`HealthProfessional` (`name`, `lastName`, `numCC`,"
                . " `adress`, `numTel`, `nif`, `email`, `maritalState`,"
                . " `birthDate`, `bloodGroup`, `nacionality`, `gender`, `password`, `profile`,"
                . " `picture`, `institution`, `developmentProfessional`) VALUES"
                . " ('$name ', '$lastName', $numCC, '$adress', $numTel, $nif, '$email',"
                . " '$maritalState', '$birthDate', '$bloodGroup', '$nacionality', '$gender', '$password',"
                . " '$profile', '$picture', '$institution', $developmentProfessional);";
    }

    $result = mysql_query($query, $conn);

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Health Professional saved with sucess";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($conn);
    }

    mysql_close($conn);

    return $response;
}

function get_terapeuta_by_id($parametros) {
    $conexao = ligar_base_dados();

    $id = $parametros['idTerapeuta'];
    $query = "select * from terapeuta where id_terapeuta=$id";

    $resultado = mysql_query($query, $conexao) or die(mysql_error());
    $validacao = validar($resultado);
    if (!$terapeuta = mysql_fetch_array($resultado)) {

        return null;
    }


    return $terapeuta;
}

function get_all_terapeutas($parametros) {

    $conexao = ligar_base_dados();
    $query = "select * from terapeuta";

    $resultado = mysql_query($query, $conexao) or die(mysql_error());

    $terapeutas = array();
    while ($terapeuta = mysql_fetch_array($resultado)) {

        $terapeutas[] = $terapeuta;
    }

    return $terapeutas;
}

//$terapeuta['nome']=$resultado['nome'];
//$terapeuta['apelido']=$resultado['apelido'];
//$terapeuta['numCC']=$resultado['num_cc'];
//$terapeuta['morada']=$resultado['morada'];
//$terapeuta['numTel']=$resultado['num_tel'];
//$terapeuta['nif']=$resultado['nif'];
//$terapeuta['email']=$resultado['email'];
//$terapeuta['numUtente']=$resultado['num_utente'];
//$terapeuta['estadoCivil']=$resultado['estado_civil'];
//$terapeuta['dataNasc']=$resultado['data_nasc'];
//$terapeuta['grupoSang']=$resultado['grupo_sang'];
//$terapeuta['nacionalidade']=$resultado['nacionalidade'];
//$terapeuta['sexo']=$resultado['sexo'];
//$terapeuta['password']=$resultado['password'];
//$terapeuta['perfil']=$resultado['perfil'];
//$terapeuta['foto']=$resultado['foto'];
//$terapeuta['instituicao']=$resultado['instituicao'];
//$terapeuta['profissionalDesenvolvimento']=$resultado['profissionais_de_desenvolvimento'];
