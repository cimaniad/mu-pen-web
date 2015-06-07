<?php
require_once 'headerDP.php';
confirmHealthProfessional();

if(!isset($_GET['structure'])){
    redirect('createExercise.php');
}
?>
<h1 class="help">Configurar Exercício</h1>
<?php
if($_GET['structure'] == 3){
    ?>
        <p class='config_p'>Escolha o número de Colunas e Linhas que a matriz deve possuir inicialmente.</p>
        NºColunas/Linhas: 
        <input type="number" id='colNumber' min="2" max="6" />
            </br>
            </br>
  
<?php
    
}else if($_GET['structure'] == 4){
  ?>
    <p class='config_p'>Coloque em cada caixa de texto as opções que pretende que sejam mostradas,
numerando, na segunda caixa de texto, pela ordem correta.</p>
    <div class="optionNumber">
        <label>
            Nº Opções:
        </label>
        <select id="optionsConfig">
            <option></option>
            <?php
            for($i=2; $i<9; $i++){
            ?>
            <option value="<?=$i?>"><?=$i?></option>
            <?php
            }
            ?>
        </select>
    </div>
        </br>
        <div class="config_exercicio">
    </div>
    </br> </br>
        </br> 
  

<?php
}else if($_GET['structure'] == 5) {
    ?>
      <p class='config_p'>Selecione o número de opções que pretende, depois disso preencha as opções com as hipóteses
      clicando no circulo que corresponder à opção correta. Também pode selecionar uma imagem se assim o pretender</p>
          <div class="optionNumber">
        <label>
            Nº Opções:
        </label>
        <select id="optionsConfig">
            <option></option>
            <?php
            for($i=2; $i<9; $i++){
            ?>
            <option value="<?=$i?>"><?=$i?></option>
                    

            <?php
            }
            ?>
        </select>
          </div>
      </br>
     <div class="config_exercicio">
    </div>
     </br> </br>
    <div class="imagem_config">
        <label>     
        Imagem:
        <input type="file" name="imagem"/> </label>  </br></br> </br>
    </div>
        </br> 
 <?php   
}else if($_GET['structure'] == 6){
    ?>
    <p class='config_p'>Escolha o número de imagens que o exercício deve possuir, assim como o tempo que as imagens demoram a desaparecer</p>
   Número de Imagens: 
     <select id="pairsImages">
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="10">10</option>
    </select>
        </br>
        </br>
        Tempo Inicial(segundos): <input type=number class="box_pares" placeholder="0" id="pairsInitialTime" required min="1" max="5">
            </br>
            </br>
        <?php
}
?>
  
        <input type="button" value="Guardar" class="submit1" id="submitConfigExer"/>
        <input type="submit" value="Cancelar" class="submit2"/>
<!--<h1 class="help">Configurar Exercício</h1>
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
        <div class="config_exercicio">-->

<!--    </div>
    </br> </br>

    <div class="audio_config">
        <label>     
        Ficheiro de Fala: 
        <input type="file" name="audio"/> </label>
    </div>
        </br> 
        <input type="submit" value="Visualizar Exercício" class="submit3"/>
        <input type="submit" value="Guardar" class="submit2"/>
        <input type="submit" value="Cancelar" class="submit2"/>
    </form>-->
</div>
</div>

<?php
require_once '../footer.php';
?>
