<?php
require_once '../session.php';
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>NEP-UM</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/nep.css" title="style" />
  <script src='../js/libs/jquery/jquery.js' type='text/javascript'></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js" type="text/javascript"></script>
  <script src='../js/objectCallers/loginCaller.js' type='text/javascript'></script>
  <script src='../js/objectCallers/domainCaller.js' type='text/javascript'></script>
  <script src="../js/functions/functions.js" type="text/javascript"></script>
  <script src="../js/objectCallers/exerciseCaller.js" type="text/javascript"></script>
  <script src="../js/objectCallers/standardExerciseCaller.js" type="text/javascript"></script>
  <script src="../js/exercises/orderExercise.js" type="text/javascript"></script>
  <script src="../js/objectCallers/mailCaller.js" type="text/javascript"></script>
  <script src="../js/objectCallers/commentsCaller.js" type="text/javascript"></script>
  <script type="text/javascript" src="../js/exercises/Pairs.js"></script>
  <script type="text/javascript" src="../js/objectCallers/InformationCaller.js"></script> 

</head>

    <body>
  <div id="main">
         <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
             <a href="#"><img src="../imagens/barram88.png" alt="Erro" style: width=105px height=91px></a>
<!--          <img src="imagens/terapeutas.jpg" alt="Erro" class="derp">-->
             </div>
          
        </div>
      </div> 
      <div class="orange1">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <div id="test"><li><a href="../redirectUser.php">Home</a></li></div>
          <li><a href="#">Informação</a>
          <ul>
              <li><a href="../articles/downloadInstitution.php">Download</a></li>
              <li><a href="../articles/consultInformation.php">Consultar Informação</a></li>
          </ul>
              </li>
              <li><a href="#">Exercícios</a>
              <ul>
                  <li><a href="../anon/exercisesTest.php?structure=1&limitNumber=20&time=60">Cálculo</a></li>
                  <li><a href="../anon/exercisesTest.php?structure=6&time=60">Matriz de Memória</a></li>
              </ul>
              </li>
              <li><a href="#">Artigos</a> 
                  <ul>
                      <li><a href="../articles/consultArticles.php">Consultar</a></li>
                  </ul>
          </li>
          <li><a href="../anon/contacts.php">Fale Connosco</a></li>
          <li><a href="../anon/login.php">Login</a></li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <h3><strong> Fale Connosco:</strong></h3>
        <p style="margin-top: -20px">Nº de Atendimento:</p>
        <p style="color: orange; font-size: 30px; margin-top: -25px"><strong>253 601 398</strong></p>
        <h3><strong> Parceiros: </strong></h3>
        <img style="margin-top: -15px; width: 200px; height: 50px" src="../imagens/uniao europeia.jpg">
        <img style="margin-top: 20px; width: 200px; height: 70px" src="../imagens/qren.jpg">
        <img style="margin-top: 25px; width: 225px; height: 50px" src="../imagens/fct.png">
        <img style="margin-top: 25px; width: 150px; height: 80px" src="../imagens/compete.png">
      </div>
        
        
    