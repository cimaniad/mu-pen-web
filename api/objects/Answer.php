<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function saveResult($params) {
    $idPatient = $params['idPatient'];
    $idExercise = $params['idExercise'];
    $resolutionTime = $params['resolutionTime'];
    $attempts = $params['attempts'];
    $wrongHits = $params['wrongHits'];
    $rightHits = $params['rightHits'];
    $correctAnswer = $params['correctAnswer'];
    $numQuadrados = $params['numQuadrados'];
    $idSession = $params['idSession'];

    $connection = dbConnect();
    $response = array();

    $query = "INSERT INTO `Answer` "
            . "(`idPatient`, `idExercise`, `resolutionTime`, `attempts`, `wrongHits`, `rightHits`, `correctAnswer`, `numQuadrados`, `idSession`) "
            . "VALUES ('$idPatient', '$idExercise', '$resolutionTime', '$attempts', '$wrongHits', '$rightHits', '$correctAnswer', '$numQuadrados', '$idSession')";

    $result = mysql_query($query, $connection);

    if ($result) {
        $response['idAnswer'] = mysql_insert_id();
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = 'Answer created with success';
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }

    mysql_close($connection);

    return $response;
}

function getAnswersByExercise($params) {
    $idSession = $params['idSession'];
    $idExercise = $params['idExercise'];
    $connection = dbConnect();
    $query = "Select * From Answer Where idExercise='$idExercise' and idSession='$idSession'";
    $result = mysql_query($query, $connection);

    if ($result) {
        while ($answer = mysql_fetch_array($result)) {
            $response[] = $answer;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 404;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}

function countAnswers($params) {
    $idSession = $params['idSession'];
    $idExercise = $params['idExercise'];
    $connection = dbConnect();
    $query = "Select idExercise, count(*) as num From Answer "
            . "Where idExercise='$idExercise' and idSession='$idSession'";
    $result = mysql_query($query, $connection);

    if (mysql_num_rows($result) === 1) {
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
    } else {
        $response['cod'] = 404;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}

function getSessionAnswers($params) {
    $idSession = $params['idSession'];

    $connection = dbConnect();
    $response = array();
    $query = "Select a.*, st.idStandardExercise, st.name "
            . "From Answer a, StandardExercise st "
            . "Where idSession='$idSession' and st.idStandardExercise in "
            . "(Select idStandardExercise From Exercise where idExercise=a.idExercise ) ;";
    $result = mysql_query($query, $connection);

    if ($result) {
        while ($answers = mysql_fetch_array($result)) {
            $response[] = $answers;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 404;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}

function getAnswersByDomain($params) {
    $idPatient = $params['idPatient'];
    $idDomain = $params['idDomain'];

    $connection = dbConnect();
    $query = "Select a.*, d.name, d.idDomain, se.idStandardExercise, se.name as nameStandard "
            . "From Answer a, Exercise e, Domain d, subDomain sd, StandardExercise se "
            . "Where a.idPatient='$idPatient' and a.idExercise=e.idExercise and sd.idDomain=d.idDomain and e.idSubDomain in "
            . "(Select idSubDomain From subDomain where idDomain='$idDomain') and se.idStandardExercise in "
            . " (Select idStandardExercise From Exercise Where idExercise=a.idExercise) group by idAnswer";
    $result = mysql_query($query, $connection);

    if ($result) {
        while ($answers = mysql_fetch_array($result)) {
            $response[] = $answers;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 404;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}

function getAnswersHealthProfesional($params) {
    $idExercise = $params['idExercise'];
    $idPatient = $params['idPatient'];
    $idHP = $params['idHealthProfessional'];

    $connection = dbConnect();
    $query = "Select * From Answer Where idExercise='$idExercise' and idPatient not in 
        (Select idPatient From Patient Where idPatient='$idPatient') and idPatient in 
        (Select idPatient From Patient Where idHealthProfessional = $idHP)";
    $response = array();
    $result = mysql_query($query, $connection);

    if ($result) {
        while ($answers = mysql_fetch_array($result)) {
            $response[] = $answers;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 404;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);
    return $response;
}
