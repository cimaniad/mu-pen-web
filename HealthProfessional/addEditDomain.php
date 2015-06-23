<?php
require_once 'headerDP.php';
confirmHealthProfessional();

if(!isset($_GET['id'])){
    redirect('../redirectUser.php');
}
?>

<?php
if($_GET['id'] == 1){
?>
<script>onlyLettersNumbers('#nameDomain');
        onlyLettersNumbers('#descriptionDomain');
</script>
<h1 class="help">Adicionar Domínio</h1>
<form method="post">
<div class="nameDom">
    <label>
        Nome: <input type="text" id='nameDomain' required class="boxExerc"/>
    </label>
</div>
</br>
<label class="side">
        Descrição: 
    </label>
<div class="descriptionDom" >
    
        <textarea cols="22" rows="6" id='descriptionDomain' required> </textarea>
</div>
<input class="submit1" type="submit" value="Cancelar"/>
<input class="submit2" type="button" value="Guardar" id="addDomain"/>

</form>
<?php
}else if($_GET['id'] ==2){
   ?>
<script>
    onlyLettersNumbers('#nameEditDomain');
    onlyLettersNumbers('#descriptionEditDomain');
    getDomains();
        </script>
<h1 class="help">Editar Domínio</h1>
<form >
<div class="domSubdom">
    <label>
        Dominio:
        <select class="boxExerc" id="allDomains">
            <option>Escolher Dominio</option>
                </select>
        
    </label>
</div> 
<div class="nameDom">
    <label>
        Nome: <input type="text" id='nameEditDomain' class="boxExerc"/>
    </label>
</div>
</br>
<label class="side">
        Descrição: 
    </label>
<div class="descriptionDom" >
    
        <textarea cols="22" rows="6" id='descriptionEditDomain'> </textarea>
</div>
<input class="submit3" type="submit" value="Cancelar"/>
<input class="submit2" type="button" value="Eliminar" id="deleteDomain"/>
<input class="submit2" type="button" value="Guardar" id="editDomain"/>

</form>
<?php
}
?>
</div>
</div>

<?php
require_once '../footer.php';
?>
