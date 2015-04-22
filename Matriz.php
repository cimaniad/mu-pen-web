<?php
require_once 'sessao.php';
confirm_admin();
?>
<!DOCTYPE html>

<html>
    <head>
        <title> Jogo da Matriz</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/jogo_memoria.css">
        <script type="text/javascript" src="js/libs/jquery/jquery.js"></script>
        <script type="text/javascript" src="js/exercices/Matriz.js"></script>
    </head>
    <body>
        <div>
			<a href="matriz_edit.php?id=1"><input type="button" value="Voltar"></a>
            <h2 id="nMaxQuadrados">O maximo de quadrados acertados é : 0</h2>
            <div id="janela">
                <div class="quadro"></div>
            </div>
        </div>
    </body>
</html>
