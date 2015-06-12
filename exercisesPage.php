<?php
require_once 'header.php';

if(!isset($_GET['structure'])){
?>

<script>
    getStructures();
</script>


<h1 class="help">Escolher Exercício</h1>
</br>
<form type="get" formaction="exercisePage.php" id="submitExercisePage">
<div class="estrut">
    <label>
        Escolher Estrutura:
        <select class="box_exerc" name="structure" id="structureCreateExercise">
        </select>
    </label>
</div>
</br>
</br>
<div class="estrut">
    <label>
        Escolher Jogo:
        <select class="box_exerc" id="exerciseByStandard" name="gameChoosen">
        </select>
    </label>
</div>
<input type="submit" class="submit1" value="Carregar Exercício">
</form>


<?php
}else 
    if($_GET['structure']==4){ //Sequence Exercises
 ?>
        <script>
          getOptionsNumber();
         getExerciseById();
        </script>
        
            <div id="support"></div><br/>
            <div id="testOrder">
                <ul id="teste-list">
                </ul>
            </div>
 
<?php
}else 
    if($_GET['structure'] == 5){ //Multiple Choice Exercises
        ?>
 
        <link rel="stylesheet" type="text/css" href="js/extra/iCheck-1.x/skins/flat/orange.css" title="style" />
        <script type="text/javascript" src="js/extra/iCheck-1.x/icheck.js"></script>
        
       
        <script>
            getCorrectOptionsNumber();
            getExerciseById();
        </script>
          <div id="support"></div><br/>
            <div class='estrutura_em'></div>
            
 <?php
    }else if($_GET['structure'] == 6) {  //Pairs Exercises
     ?>
          <link rel="stylesheet" href="css/jogo_pares.css">
          <script>
              getConfigs();
          </script>
         
         <div id="support"></div>
          <div>
<!--	<a href="matriz_edit.php?id=2">
            <input type="button" value="Voltar"></a>-->
            <h2 id="fimJogo"></h2>
            <p id="clicks">0 clicks</p>
            <p id="tempoJogo">0 segundos</p>
            <div id="janela">
               <div id="quadro"></div>
            </div>
           </div>
  <?php          
    }else if($_GET['structure'] == 3){  //Memory Matrix Exercises
        ?>
        <link rel="stylesheet" href="css/jogo_memoria.css">
        <script>
            getConfigs();
        </script>    
        <script type="text/javascript" src="js/exercises/Matriz.js"></script>
         <div id="support"></div>
            <div>
<!--            <a href="matriz_edit.php?id=1"><input type="button" value="Voltar"></a>-->
            <h2 id="nMaxQuadrados">O maximo de quadrados acertados é : 0</h2>
            <div id="janela">
                <div class="quadro"></div>
            </div>
        <?php
    }
    
           
    if(isset($_GET['structure'])){  
?>

        <input class="submit1" type="button" value="Enviar Resposta" id="orderExerciseSubmit">
 <?php
    }
 ?>
    </div>
    </div>

<?php
require_once 'comment.php';
require_once 'footer.php';