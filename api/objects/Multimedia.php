<?php

require_once dirname(__FILE__) . '/../db/DbConn.php';

function addDirectory($params) {
    $name = $params['name'];

    $connection = dbConnect();
    $response = array();

    $query = "Select * From Directory Where name='$name'";
    $resul = mysql_query($query, $connection);

    if (mysql_num_rows($resul) === 0) {
        $query = "INSERT INTO `Directory` (`name`) VALUES ('$name')";
    } else {
        $response['cod'] = 501;
        $response['error'] = TRUE;
        $response['msg'] = "Name already exists";
        mysql_close($connection);
        return $response;
    }
    $result = mysql_query($query, $connection);

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Directory saved with success";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);

    return $response;
}

function addMultimedia($params) {
    $name = $params['name'];
    $url = $params['url'];
    $idDirectory = $params['idDirectory'];

    $connection = dbConnect();
    $response = array();

    $query = "Select * From Multimedia Where name='$name' and idDirectory='$idDirectory'";
    $resul = mysql_query($query, $connection);

    if (mysql_num_rows($resull) === 0) {
        $query = "INSERT INTO `Multimedia` (`name`, `url`, `idDirectory`) VALUES ('$name', '$url', '$idDirectory')";
    } else {
        $response['cod'] = 501;
        $response['error'] = TRUE;
        $response['msg'] = "Name already exists";
        mysql_close($connection);
        return $response;
    }
    $result = mysql_query($query, $connection);

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Multimedia saved with success";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);

    return $response;
}

function getDirectory() {
    $connection = dbConnect();
    $response = array();

    $query = "Select * From Directory";
    $result = mysql_query($query, $connection);
    if ($result) {
        while ($directory = mysql_fetch_array($result)) {
            $response[] = $directory;
        }
        $response['cod'] = 200;
    } else {
        $response['msg'] = mysql_error($connection);
        $response['error'] = TRUE;
        $response['cod'] = 404;
    }
    mysql_close($connection);
    return $response;
}

function getMultimediaById($params) {
    $idDirectory = $params['idDirectory'];

    $connection = dbConnect();

    $query = "Select * From Multimedia Where idDirectory='$idDirectory'";
    $result = mysql_query($query, $connection);
    $response = array();

    if (mysql_num_rows($result) !== 0) {
        while ($multimedia = mysql_fetch_array($result)) {
            $response[] = $multimedia;
        }
        $response['cod'] = 200;
    } else {
        $response['cod'] = 404;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
        ;
    }

    mysql_close($connection);
    return $response;
}

function addMultimediaToExercise($params) {
    $idMultimedia = $params['idMultimedia'];
    $idExercise = $params['idExercise'];

    $connection = dbConnect();

    $query = "INSERT INTO `ExerciseMultimedia` (`idMultimedia`, `idExercise`) "
            . "VALUES ('$idMultimedia', '$idExercise')";

    $result = mysql_query($query, $connection);
    $response = array();

    if ($result) {
        $response['cod'] = 201;
        $response['error'] = FALSE;
        $response['msg'] = "Multimedia added to exercise";
    } else {
        $response['cod'] = 500;
        $response['error'] = TRUE;
        $response['msg'] = mysql_error($connection);
    }
    mysql_close($connection);

    return $response;
}

function getMultimediaByExercise($params){
    $idExercise = $params['idExercise'];
    
    $connection = dbConnect();
    
    $query = "Select * From Multimedia Where idMultimedia in "
            . "(Select idMultimedia From ExerciseMultimedia Where idExercise='$idExercise')";
    $result = mysql_query($query, $connection);
    $response = array();

    if(mysql_num_rows($result) === 1){
        $response = mysql_fetch_array($result);
        $response['cod'] = 200;
        }else {
           $response['cod'] = 404;
           $response['error'] = TRUE;
           $response['msg'] = mysql_error($connection);;
        }

    mysql_close($connection);
    return $response;
}