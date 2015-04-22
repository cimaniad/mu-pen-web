<?php
require_once 'sessao.php';
confirm_admin();
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
          <link rel="stylesheet" type="text/css" href="css/nep.css" title="style" />
        <title></title>
    </head>
    <body>
          <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <a href="index.php"><img src="imagens/nep_logo.jpg" alt="Erro"></a> 
          <img src="./Imagens/terapeutas.jpgalt="Erro" class="derp">
             </div>
          
        </div>
      </div>
      <div class="orange1">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <li><a href="#">Exercícios</a>
          <ul>
              <li><a href="matriz_edit.php?id=1">Matriz</a></li>
               <li><a href="matriz_edit.php?id=2">Pares</a></li>
          </ul>
          </li>
           <li><a href="login.php?logout=1" onClick="return confirm('Tem a certeza que quer sair?');">Sair</a>   </li>
          
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
      </div>
    </body>
</html>
