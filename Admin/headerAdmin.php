<?php
require_once '../session.php';
confirm_admin();
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>NEP-UM</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/nep.css" title="style" />
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src='../js/libs/jquery/jquery.js' type='text/javascript'></script>
  <script src='../js/objectCallers/loginCaller.js' type='text/javascript'></script>
  <script src='../js/objectCallers/InformationCaller.js' type='text/javascript'></script>
  <script src='../js/functions/functions.js' type='text/javascript'></script>
</head>

<body>
  <div id="main">
         <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
             <a href="#"><img src="../imagens/barram.png" alt="Erro" style: width=105px height=91px></a> 
<!--          <img src="imagens/terapeutas.jpg" alt="Erro" class="derp">-->
             </div>
          
        </div>
      </div> 
      <div class="orange1">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <div id="test"><li><a href="../redirectUser.php">Home</a></li></div>
          <li><a href="#">Artigos</a>
          <ul>
              <li><a href="../articles/addarticles.php">Publicar </a></li>
               <li><a href="../articles/consultArticles.php">Consultar</a></li>
          </ul>
              </li>
              <li><a href="">Informação</a>
          <ul>
              <li><a href="../Admin/addInformation.php?id=1">Inserir </a></li>
               <li><a href="../Admin/addInformation.php?id=2">Editar</a></li>
               <li><a href="../articles/consultInformation.php">Consultar</a></li>
               <li><a href='../articles/downloadInstitution.php'>Download</a></li>
          </ul>
              </li>
         
          <li><a href="../anon/login.php?logout=1" onClick="return confirm('Tem a certeza que quer sair?');">Logout</a>   </li>
        </ul>
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <h3><strong> Fale Connosco:</strong></h3>
        <p style="margin-top: -20px">Nº de Atendimento:</p>
        <p style="color: orange; font-size: 30px; margin-top: -25px"><strong>253 601 398</strong></p>
        <h3><strong> Parceiros: </strong></h3>
        <img style="margin-top: -15px; width: 200px; height: 50px" src="../imagens/uniao europeia.jpg">
        <img style="margin-top: 20px; width: 200px; height: 70px" src="../imagens/qren.jpg">
        <img style="margin-top: 25px; width: 225px; height: 50px" src="../imagens/fct.png">
        <img style="margin-top: 25px; width: 150px; height: 80px" src="../imagens/compete.png">
      </div>