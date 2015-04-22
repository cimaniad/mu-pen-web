<?php

require_once dirname(__FILE__) . '/Configs.php';

/*
 * função que faz a conexão com a base de dados
 */

function dbConnect() {
    $conn = mysql_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD);
    if ($conn) {
        mysql_select_db(MYSQL_DATABASE, $conn);
        mysql_query("SET NAMES utf8");
    }

    return $conn;
}
