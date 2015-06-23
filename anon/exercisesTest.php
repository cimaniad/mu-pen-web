<?php
include '../anon/headeranon.php';
?>

<?php
    if ($_GET['structure'] == 6) {  //Pairs Exercises

    ?>
    
    <link rel="stylesheet" href="../css/Back-N.css">

    <script type="text/javascript" src="../js/exercises/Back-N.js"></script>
    </br>
    </br>
    </br>
    <div id="dialogExercise">
        <script>getConfigs();</script>
        <div class="instructions1">
            <p class="help1"><strong>Instruções sobre o jogo!</strong></p>
            <div id="questionResolve"></div>
        </div>
        <div id="gameDiv">
            <div id="window">
                <p id="gameTime2"></p>
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
} else if ($_GET['structure'] == 1) {
    
    ?>
    <link rel="stylesheet" href="../css/Math.css">
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