<?php
if (!isset($_GET['structure'])) {
    require_once '../HealthProfessional/headerDP.php';
    ?>

    <script>
        getStructures();
    </script>

    <div id="exerciseChoose">
        <h1 class="help">Escolher Exercício</h1>
        </br>

        <form type="get" formaction="exercisePage.php" id="submitExercisePage">
            <div class="estrut">
                <select class="caixa_exerc" name="structure" id="structureCreateExercise">
                    <option>Escolher Estrutura</option>
                </select>

            </div>
            </br>
            </br>
            <div class="estrut">
                <select class="caixa_exerc" id="exerciseByStandard" name="gameChoosen">
                    <option>Escolher Jogo</option>
                </select>
                <input type="hidden" name="time" value="0">
            </div>
            <input type="submit" class="submit1" value="Carregar Exercício">
        </form>
    </div>


    <?php
} else

if ($_GET['structure'] == 4) { //Sequence Exercises
    require_once 'exercisesHeader.php';
    ?>
    <script>
        getOptionsNumber();
        getExerciseById();
    </script>

    <div id="support"></div><br/>
    <div class="instructions1">
        <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
        <div id="questionResolve"></div>
    </div> 
    <div id="gameDiv">
        <div id="questionExercise"></div>
        <div id="testOrder">
            <ul id="teste-list">
            </ul>
        </div>
        <div id="gameTime"></div>
    </div>

    <?php
} else
if ($_GET['structure'] == 5) { //Multiple Choice Exercises
    require_once 'exercisesHeader.php';
    ?>

    <link rel="stylesheet" type="text/css" href="../js/extra/iCheck-1.x/skins/flat/orange.css" title="style" />
    <script type="text/javascript" src="../js/extra/iCheck-1.x/icheck.js"></script>
    <script>
        getCorrectOptionsNumber();
        getExerciseById();
    </script>

    <div id="support"></div>
    <br/>
    <div class="instructions1">
        <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
        <div id="questionResolve"></div>
        <div id="gameTime"></div>
    </div>
    <div id="gameDiv">
        <div id="questionExercise"></div>
        <div id="imageMultExercise"></div>
        <div class='estrutura_em'></div>
        <div id="gameTime"></div>
    </div>
    <?php
} else if ($_GET['structure'] == 6) {  //Pairs Exercises
    require_once 'exercisesHeader.php';
    ?>
    
    <link rel="stylesheet" href="../css/jogo_pares.css">
    <script>
        getConfigs();
    </script>
    <?php
    if($_GET['time'] > 0){
    ?>
    <script type="text/javascript" src="../js/exercises/Pairs.js"></script>

    <div id="support"></div>
    <div class="instructions1">
        <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
        <div id="questionResolve"></div>
    </div> 

    <!--	<a href="matriz_edit.php?id=2">
                <input type="button" value="Voltar"></a>-->

    <div id="gameDiv">

        <div id="janela">
            <div id="quadro"></div>
        </div>

        <h2 id="fimJogo"></h2>
        <p id="clicks">0 clicks</p>
        <p id="tempoJogo">0 segundos</p>
    </div>
    <?php
    }
} else if ($_GET['structure'] == 3) {  //Memory Matrix Exercises
    require_once 'exercisesHeader.php';
    ?>
    <link rel="stylesheet" href="../css/jogo_memoria.css">
        <script>
        getConfigs();
    </script>    
    <?php
    if($_GET['time'] > 0){
    ?>
    <script type="text/javascript" src="../js/exercises/Matriz.js"></script>


    <div id="support"></div>

    <div class="instructions1">
        <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
        <div id="questionResolve"></div>
    </div> 

    <div id="gameDiv"> 


        <div id="janela">
            <div class="quadro"></div>
        </div>
        <p id="gameTime2">0 segundos</p>
        <!--              <h2 id="nMaxQuadrados">O maximo de quadrados acertados é : 0</h2>-->
    </div>
    <!--              <h2 id="nMaxQuadrados">O maximo de quadrados acertados é : 0</h2>     -->
    <?php 
    }
} else if ($_GET['structure'] == 7) {
    require_once 'exercisesHeader.php';
    ?>
    <link rel="stylesheet" href="../css/SequenceMatrix.css">
        <script>
        getConfigs();
    </script>   
    <?php
    if($_GET['time']>0){
        ?>
    <script type="text/javascript" src="../js/exercises/SequenceMatrix.js"></script>
 
    <div id="support"></div>

    <div class="instructions1">
        <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
        <div id="questionResolve"></div>
    </div> 

    <div id="gameDiv"> 


        <div id="janela">
            <div class="quadro"></div>
        </div>
        <p id="tempoJogo">0 segundos</p>
        <!--              <h2 id="nMaxQuadrados">O maximo de quadrados acertados é : 0</h2>-->
    </div>
    <!--              <h2 id="nMaxQuadrados">O maximo de quadrados acertados é : 0</h2>     -->

    <?php
    }
} else if ($_GET['structure'] == 2) {  // Back-N game
    ?>

    <?php
    require_once 'exercisesHeader.php';
    ?>
    <link rel="stylesheet" href="../css/Back-N.css">
            <script>getConfigs();</script>
     <?php
     if($_GET['time']>0){
     ?>
    <script type="text/javascript" src="../js/exercises/Back-N.js"></script>

    <div id="dialogExercise">

        <div class="instructions1">
            <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
            <div id="questionResolve"></div>
        </div>
        <div id="gameDiv">
            <div id="window">
                <p id="gameTime2">0 segundos</p>
                <div id="score">
                    <p id="succededHits"></p>
                    <p id="failedHits"></p>
                </div>
                <div id="panel">
                    <img id="img" src="">
                </div>
            </div>
        </div>
    </div>

    <?php
     }
} else if ($_GET['structure'] == 1) {
    require_once 'exercisesHeader.php';
    ?>
        <link rel="stylesheet" href="../css/Math.css">
    <script>getConfigs();</script>
    <?php if($_GET['time'] > 0){
        
    ?>
    <script type="text/javascript" src="../js/exercises/Math.js"></script>
    <div class="instructions1">
        <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
        <div id="questionResolve"></div>
    </div>
    <div id="gameDiv">
    <div class="container">
    <div class="game">
      <h1 id="time"></h1>
      <div id="question">
        <p></p>
        <input id="answer" placeholder="resposta">
      </div>
      <div id="score">
        <h1 id="wrights"></h1>
        <h1 id="wrongs"></h1>
      </div>
    </div>
  </div>
    </div>

    <?php
    }
}

if (isset($_GET['structure']) && (($_GET['structure'] == 4) || ($_GET['structure'] == 5))) {
    ?>

    <input type="button" value="Enviar Resposta" id="orderExerciseSubmit">
    <?php
}
?>
</div>
<input type="hidden" value="<?= $_SESSION['idPatient'] ?>" id="idpatientExercises"> 

<?php
require_once '../footer.php';
if (isset($_GET['structure'])) {
    require_once '../Patient/comment.php';
}