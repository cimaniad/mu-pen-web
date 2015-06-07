<?php
require_once 'headerDP.php';
confirmHealthProfessional();
?>
<h1 class="help">Criar Exercício</h1>
</br>
</br>
<script>getDomains();
        getStructures();
    </script>

<div id="dom">
    <label>
        Escolher Dominio: 
        <select class="boxExerc" id='allDomains' name="domain">
            <option>Escolher Dominio</option>
        </select>
    </label>
</div>
    </br>
<div class="sub-dom">
    <label>
        Escolher Sub-Dominio:
        <select class="boxExerc" id='subDomainsExercise' name="subDomain"> 
        </select>
    </label>
</div>
    </br>
<div class="nome_exerc">
    <label>
         Nome:  </label>
    <input type="text" name="name" class="caixa_exerc" id="nameExercise"/>
   
</div>
    </br>
  
<div class="descricao">
    <label class="lab">
        Tarefa:</label>
            <textarea type="text" name="description" rows="5" cols="21" class="area_exer" id="questionExercise"></textarea>
      
</div>    
</br>
<div class="estrut">
    <label>
        Escolher Estrutura:
        <select class="box_exerc" name="structure" id="structureCreateExercise">
        </select>
    </label>
</div>
</br>
<div class="nivel_exer">
    <label>
        Nível de Dificuldade:
        <select class="boxExerc" name="level" id="levelExercise">
             <option value="1">1 - Nível de Dificuldade Baixo</option>
             <option value="2">2 - Nível de Dificuldade Médio-Baixo</option>
             <option value="3">3 - Nível de Dificuldade Médio</option>
             <option value="4">4 - Nível de Dificuldade Médio-Alto</option>
             <option value="5">5 - Nível de Dificuldade Alto</option>
        </select>
    </label>
</div>
</br>
<div class="tempo_exer">
    <label>
        Tempo(mm:ss): </label>
         <input type="text" name="time" class="box_exerc" id="timeCreateExercise">
    
    </br>
</div>
</br>

        <input type="button" class="submit1" value="Configurar Exercício" id="createExerciseButton"/>
        <input type="submit" class="submit2" value="Cancelar"/>


  </div>
</div>

<?php
require_once '../footer.php';

