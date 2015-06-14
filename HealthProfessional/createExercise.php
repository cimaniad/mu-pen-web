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
    
<div class="estrut">
    <label>
        Escolher Estrutura:
        <select class="boxExerc" name="structure" id="structureCreateExercise">
        </select>
    </label>
</div>
</br>
</br>
</br>
<div id="saveExercise">
        <input type="submit" class="submit1" value="Cancelar" id="cancelThings"/>
        <input type="button" class="submit2" value="Configurar Exercício" id="createExerciseButton"/>
</div>


  </div>
</div>

<?php
require_once '../footer.php';

