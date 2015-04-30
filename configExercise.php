<?php
require_once 'header.php';
?>
<h1 class="help">Configurar Exercício</h1>
<p class='config_p'>Seleccione a questão que pretende fazer, e de seguida em cada caixa de texto coloque as opções que pretende que sejam mostradas,
seleccione também o circulo que corresponde à resposta correta.</p>
    <form method="post" enctype="multipart/form-data">
<div class="perguntaExer">
    <label>
         Questão:
         <input type="text" name="pergunta" class="caixa_config">
    </label>
   
</div>
        
        </br>
        <div class="config_exercicio">
<?php
    if($_GET['level']==1){
        $count=0;
            while($count !=3){
                $count++;
               ?> 
            <label>Resposta <?=$count?>:</label>                
    <input type="text" class="caixa_config" name="response<?=$count?>">  
    <input type="radio" name="correct" value="<?=$count?>">
 
    </br>
    <?php
            }
        ?>
    <?php
        
    }
?>
    </div>
    </br> </br>
    <div class="imagem_config">
        <label>     
        Imagem:
        <input type="file" name="imagem"/> </label>  </br></br> </br>
    </div>
    <div class="audio_config">
        <label>     
        Ficheiro de Fala: 
        <input type="file" name="audio"/> </label>
    </div>
        </br> 
        <input type="submit" value="Visualizar Exercício" class="submit3"/>
        <input type="submit" value="Guardar" class="submit2"/>
        <input type="submit" value="Cancelar" class="submit2"/>
    </form>
</div>
</div>

<?php
require_once 'footer.php';
?>
