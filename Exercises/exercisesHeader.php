<?php
require_once '../session.php';
confirmPatientOrDP();
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
  <script src="../js/objectCallers/multimediaCaller.js" type="text/javascript"></script>  
  <script src="../js/exercises/orderExercise.js" type="text/javascript"></script>
  <script src="../js/objectCallers/mailCaller.js" type="text/javascript"></script>
  <script src="../js/objectCallers/commentsCaller.js" type="text/javascript"></script>


</head>

    <body>
  <div id="main">
         <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <a href="#"><img src="../imagens/barram.png" alt="Erro" style: width=125px height=115px></a> 
<!--          <img src="imagens/terapeutas.jpg" alt="Erro" class="derp">-->
             </div>
          
        </div>
      </div> 

            <div class="orange1">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <div id="test"><li><a href="exercisesHeader.php">Home</a></li></div>
          <li><a href="#">Programa</a>
          <ul>
              <li><a href="#">Quem Somos</a></li>
               <li><a href="#">Missão</a></li>
          </ul>
              </li>
              <li><a href="#">Exercícios</a></li>
          <li><a href="#">Artigos</a> 
          </li>
          <li><a href="contacts.php">Fale Connosco</a></li>
          <li><a href="login.php">Login</a></li>
        </ul>
      </div>
  </div>
        <div id="site_content1">
<!--  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
           class="logo_colour", allows you to change the colour of the text 
          <a href="#"><img src="imagens/nep_logo.jpg" alt="Erro"></a> 
          <img src="imagens/terapeutas.jpg" alt="Erro" class="derp">
             </div>
          
        </div>
      </div>
      <div class="orange1">
        <ul id="menu_dp">
           put class="selected" in the li tag for the selected page - to highlight which page you're on 
          <li><a href="headerDP.php">Home</a></li>
          <li><a href="#">Perfil Pessoal</a>
          <ul>
              <li><a href="#">Consultar</a></li>
               <li><a href="#">Editar</a></li>
          </ul>
              </li>
              <li><a href="#">Exercícios</a>
              <ul>
                <li><a href="createExercise.php">Criar Exercício</a></li>
                <li><a href="addEditDomain.php?id=1">Adicionar Domínio</a></li>
                <li><a href="addEditDomain.php?id=2">Editar Domínio</a></li>
                <li><a href="addEditSubDomain.php?id=1">Adicionar Sub-Dominio</a></li>
                <li><a href="addEditSubDomain.php?id=2">Editar Sub-Dominio</a></li>
              </ul>
              </li>
           <li><a href="#">Informação</a>
          <ul>
              <li><a href="#">Inserir Informação</a></li>
               <li><a href="#">Editar Informação</a></li>
               <li><a href="#">Consultar Informação</a></li>
               <li><a href="#">Adicionar Artigo</a></li>
               <li><a href="#">Consultar Artigos</a></li>
          </ul>
              <li><a href="#">Relatórios</a>
          <ul>
              <li><a href="#">Paciente </a></li>
               <li><a href="#">Anónimo</a></li>
              
          </ul>
              <li><a href="#">Multimedia</a>
                  <ul>
                      <li><a href="addDirectory.php">Adicionar Diretoria</a></li>
                      <li><a href="">Adicionar Multimédia</a></li>
                  </ul>
              </li>
                    
           <li><a href="../login.php?logout=1" onClick="return confirm('Tem a certeza que quer sair?');">Logout</a>   </li>
        </ul>
      </div>
    </div>-->
