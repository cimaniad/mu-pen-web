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
<h1 class="help">Adicionar Sub-Domínio</h1>
 <script> getDomains();</script>
<form method="post">
<div class="nameDom">
    <script>onlyLettersNumbers('#nameSubDomain');
            onlyLettersNumbers('#subDomainDescription');
    </script>
    <label>
        Nome: <input type="text" id="nameSubDomain" class="caixa_exerc" required/>
    </label>
</div>
    </br>
<label class="side">
        Descrição: 
    </label>
<div class="descriptionDom">
    
        <textarea cols="22" rows="6" id="subDomainDescription"> </textarea>
</div>
<div class="domSubdom">
    <label>
        Dominio:
        <select name="subDomainSelect" class="boxExerc" id="allDomains">
         
        </select>
    </label>
</div>
    <input type="button" class="submit1" id="addSubDomain" value="Guardar"/>
    <input type="submit" class="submit2" value="Cancelar"/>
 </form>

<?php
}else if($_GET['id'] ==2){
   ?>
 <h1 class="help">Editar Sub-Domínio</h1>
 <script> getDomains();
          getAllSubDomains();
 </script>
<form method="post">
<div class="subDomSubdom">
    <label>
        Sub-Dominio:
        <select class="boxExerc" id="allSubDomains">
            <option>Escolher Sub-Dominio</option>
        </select>
    </label>
</div>
<div class="nameDom">
    <script>onlyLettersNumbers('#nameEditSubDomain');
            onlyLettersNumbers('#SubDomainEditDescription');
    </script>
    <label>
        Nome: <input type="text" id="nameEditSubDomain" class="caixa_exerc" required/>
    </label>
</div>
    </br>
<label class="side">
        Descrição: 
    </label>
<div class="descriptionDom">
    
        <textarea cols="22" rows="6" id="subDomainEditDescription"> </textarea>
</div>
<div class="domSubdom">
    <label>
        Dominio:
        <select class="boxExerc" id="allDomains">
         
        </select>
    </label>
</div>
    <input type="button" class="submit3" id="editSubDomain" value="Guardar"/>
    <input type="button" class="submit2" id="deleteSubDomain" value="Eliminar"/>
     <input type="submit" class="submit2" value="Cancelar"/>
 </form>
<?php
}
?>
   </div>
</div>
<?php
require_once '../footer.php';
?>
