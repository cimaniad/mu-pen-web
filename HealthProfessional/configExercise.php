<?php
require_once 'headerDP.php';
confirmHealthProfessional();

if (!isset($_GET['structure'])) {
    redirect('createExercise.php');

?>

<?php

}
?>
    <h1 class="help">Configurar Exercício</h1>
    <?php
    if($_GET['structure'] == 1){
    ?>
    <p class="config_p">Insira o tempo de jogo e até que número os cálculos podem chegar, 
        exemplo se inserir 10 a soma ou subtração dos cálculos só poderá chegar a esse valor.</p>
    <h4 class="help">Tempo Limite</h4>
    <input type="number" name="time" class="caixa_exerc" id="timeCreateExercise" placeholder="Insira tempo(segundos)">
    </br>
    </br>    
    <h4 class="help">Número Limite</h4>
    <input type="number" class="caixa_exerc" id="limitNumber" placeholder="Insira um Número">
    </br>
    </br>    
    
 <?php
} else if ($_GET['structure'] == 2) {
    ?>
    <p class="config_p">Insira o tempo limite que pretende atribuir a este exercício</p>

    </br>
    <h4 class="help">Tempo Limite</h4>
    <input type="number" name="time" class="caixa_exerc" id="timeCreateExercise" placeholder="Insira tempo(segundos)">

    </br>
    </br>


    <?php
} else if (($_GET['structure'] == 3) || $_GET['structure'] == 7) {
    ?>
    <p class='config_p'>Escolha o número de Colunas e Linhas da matriz, assim como o tempo que o utilizador tem para acabar o exercício e 
        o tempo que demora a desaparecerem os quadrados.</p>
    <h4 class="help">Colunas/Linhas</h4>
    <input type="number" id='colNumber' min="2" max="6" placeholder="NºColunas/Linhas" class="caixa_exerc"/></br> </br> 
    <h4 class="help">Tempo Limite</h4>
    <input type="number" name="time" class="caixa_exerc" id="timeCreateExercise" placeholder="Insira tempo(segundos)"> </br> </br>
    <h4 class="help">Tempo visibilidade quadrados</h4>
    <input type=number class="caixa_exerc" placeholder="Insira tempo(segundos)" id="pairsInitialTime" required min="1" max="5">
    </br>
    </br>

    <?php
} else if ($_GET['structure'] == 4) {
    ?>
    <p class='config_p'>Coloque em cada caixa de texto as opções que pretende que sejam mostradas,
        numerando, na segunda caixa de texto, pela ordem correta.</p>
    <h4 class="help">Questão</h4>
    <textarea type="text" name="description" rows="1" cols="60" class="area_exer" id="questionExercise"></textarea></br></br>
    <h4 class="help">Escolha as Opções</h4> 
    <div class="optionNumber">        
        <select id="optionsConfig">
            <option>NºOpções</option>
            <?php
            for ($i = 2; $i < 8; $i++) {
                ?>
                <option value="<?= $i ?>"><?= $i ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <div class="config_exercicio">
    </div>
    <div id="chooseTime4">
        </br>
        </br>
        <h4 class="help">Escolher Nível</h4>
        <select class="boxExerc" name="level" id="levelExercise">
            <option value="1">1 - Nível de Dificuldade Baixo</option>
            <option value="2">2 - Nível de Dificuldade Médio-Baixo</option>
            <option value="3">3 - Nível de Dificuldade Médio</option>
            <option value="4">4 - Nível de Dificuldade Médio-Alto</option>
            <option value="5">5 - Nível de Dificuldade Alto</option>
        </select>
    </div>
    </br>
    </br> 


    <?php
} else if ($_GET['structure'] == 5) {
    ?>

    <script>getDirectory();</script>
    <p class='config_p'>Selecione o número de opções que pretende, depois disso preencha as opções com as hipóteses
        clicando no circulo que corresponder à opção correta. Também pode selecionar uma imagem e um tempo limite ao exercício
        se assim o pretender</p>
    <h4 class="help">Questão</h4>
    <textarea type="text" name="description" rows="1" cols="60" class="area_exer" id="questionExercise"></textarea></br></br>
    <h4 class="help">Escolha as Opções</h4> 
    <div class="optionNumber">
        <select id="optionsConfig">
            <option>Nº Opções</option>
            <?php
            for ($i = 2; $i < 8; $i++) {
                ?>
                <option value="<?= $i ?>"><?= $i ?></option>                  
                <?php
            }
            ?>
        </select>
    </div>
    </br>
    <div class="config_exercicio">
    </div>
    </br> </br> 
    <div id="chooseDirectory">
        </br>
        </br>
        <h4 class="help">Escolher Nível</h4>
        <select class="boxExerc" name="level" id="levelExercise">
            <option value="1">1 - Nível de Dificuldade Baixo</option>
            <option value="2">2 - Nível de Dificuldade Médio-Baixo</option>
            <option value="3">3 - Nível de Dificuldade Médio</option>
            <option value="4">4 - Nível de Dificuldade Médio-Alto</option>
            <option value="5">5 - Nível de Dificuldade Alto</option>
        </select>
        </br>
        </br>
        <h4 class="help">Escolher Imagem</h4>
        <select id="allDirectory">
            <option>Escolha Diretoria</option>
        </select> 
        </br>
        </br>
        <div id="damn">
            <select id="MultimediaByDirectory" name="MultimediaByDirectory" class="MultimediaByDirectory12"></select>
        </div>
 
    </div>
    </br>
    </br>
    <?php
} else if ($_GET['structure'] == 6) {
    ?>
    <p class='config_p'>Escolha o número de imagens que o exercício deve possuir, assim como o tempo que as imagens demoram a desaparecer</p>
    <h4 class="help">Nº Imagens<h4>
            <select id="pairsImages">
                <option value="3">3</option>
                <option value="6">6</option>
                <option value="10">10</option>
            </select>
            </br>
            </br>
            <h4 class="help">Tempo visibilidade quadrados</h4>    
            <input type=number class="caixa_exerc"  placeholder="Insira tempo(segundos)" id="pairsInitialTime" required min="1" max="5">
            </br>
            </br>
            <?php
        }
        
 if (!isset($_GET['structure'])) {
    redirect('createExercise.php');
 }else if (($_GET['structure'] != 4) && ($_GET['structure'] != 5)) {
            ?>
            <h4 class="help">Escolher Nível</h4>
            <select class="boxExerc" name="level" id="levelExercise">
                <option value="1">1 - Nível de Dificuldade Baixo</option>
                <option value="2">2 - Nível de Dificuldade Médio-Baixo</option>
                <option value="3">3 - Nível de Dificuldade Médio</option>
                <option value="4">4 - Nível de Dificuldade Médio-Alto</option>
                <option value="5">5 - Nível de Dificuldade Alto</option>
            </select>
            <?php
        }
        ?>

        <div id="saveExercise">      
            <input type="submit" value="Cancelar" class="submit1" id="cancelThings"/>   
            <input type="button" value="Guardar" class="submit2" id="submitConfigExer"/>
        </div>

        </div>
        </div>

        <?php
        require_once '../footer.php';
        ?>
