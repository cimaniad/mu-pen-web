<?php
require_once 'session.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <title> Jogo dos Pares</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/jogo_pares.css">
        <script type="text/javascript" src="./js/libs/jquery/jquery.js"></script>
        <script type="text/javascript" src="./js/exercices/Pares.js"></script>
    </head>
    <body>
        <div>
			<a href="matriz_edit.php?id=2"><input type="button" value="Voltar"></a>
            <h2 id="fimJogo"></h2>
            <p id="clicks">0 clicks</p>
            <p id="tempoJogo">0 segundos</p>
            <div id="janela">
                <div id="quadro"></div>
            </div>
        </div>
    </body>
</html>
