<?php
require_once 'headerAdmin.php';

if(!isset($_GET['id'])){
    redirect('../redirectUser.php');
}

if($_GET['id'] == 1){
?>

<h1 class="help">Adicionar Informação</h1>
<form method="post">
<div>
    <label> 
        <h4 class='help'>Adicionar Título</h4>
        
    <textarea id='titleInfo' required></textarea>
    </label>
    </div>
    </br>
    </br>
    <div>
    <h4 class='help'>Adicionar Conteúdo</h4>
    <label>
    <textarea id='contentInfo' required style="width: 600px; height: 100px; min-width: 600px; min-height: 100px; max-width: 600px;"></textarea>
    </label>
    <input class="submit1" type="submit" value="Cancelar"/>
    <input class="submit2" type="button" value="Guardar" id="addInformation"/>
</div>
</form>
<?php
}  else if($_GET['id'] == 2){
        ?>
        
        <script>
    getInformation();
        </script>
        <h1 class="help">Editar Informação</h1>
<form >
<div class="domSubdom">
    <label>
        Informação:
        <select class="boxExerc" id="allInformation">
            <option>Escolher Titulo</option>
                </select>
        </label>
</div> 
<div class="nameDom">
    <label>
        Titulo: <textarea type="text" id='titleEditInformation' class="boxExerc"></textarea>
    </label>
</div>
</br>
<label class="side">
        Conteúdo:
    </label>
<div class="descriptionDom" >
    
        <textarea cols="22" rows="6" id='contentEditInformation'> </textarea>
</div>
<input class="submit3" type="submit" value="Cancelar">
<input class="submit2" type="button" value="Eliminar" id="deleteInformation"/>
<input class="submit2" type="button" value="Guardar" id="editInformation"/>

<?php
}
?>