<?php
include 'headerPatient.php';

confirmPatient();
if(!isset($_GET['id'])){
    redirect('../redirectUser.php');
}

if($_GET['id'] == 1){
?>
<script>getPatientProfile()</script>
<h1 style="color: #A30000;"><b> Perfil Pessoal</b></h1>
<p><span id='normal'>Nome:</span> <span id='nameProfile'></p><img src="../imagens/perfil.jpeg" alt="Erro" class="merp" width="125px" height="100px">
<p><span id='normal'>Data de Nascimento: </span> <span id='dataProfile'></span></p>
<p><span id='normal'>Sexo: </span>  <span id='genderProfile'></span> </p>
<p><span id='normal'>NIF: </span>  <span id='nifProfile'></span></p>
<p><span id='normal'>Morada:</span>  <span id='adressProfile'></span></p>
<p><span id='normal'>Email: </span>  <span id='emailProfile'></span></p>
<p><span id='normal'>Nº Telefone: </span>  <span id='numberProfile'></span></p>
<p><span id='normal'>NºCC: </span>  <span id='ccProfile'></span></p>
<p><span id='normal'>Estado Civil: </span>  <span id='maritalStateProfile'></span></p>
<p><span id='normal'>Nacionalidade:</span>  <span id='nationalityProfile'></span></p>
<p><span id='normal'>Grupo Sanguineo: </span>  <span id='bloodGroupProfile'></span></p>
<p><span id='normal'>Patologia: </span>  <span id='pathologyProfile'></span></p>
<input type="hidden" id='idPatientProfile' value="<?=$_SESSION['idPatient']?>"/>
<?php
}else if($_GET['id'] == 2){
    ?>
<h1 class="help">Editar Perfil</h1>
<script>getInfoPatient()</script>
<p class="config_p">Modifique um dos campos se surgirem alterações</p>
<div id="emailConfig">
<label>Email: </label> <input type="text" id="emailProf"></br> </br>
</div>
<div id="numbTelephoneEdit">
<label>NºTelefone: </label> <input type="text" id="numbTelephone"></br></br>
</div>
<div>
<label>Estado Civil: </label> <input type="text" id="civilState"> </br> </br>
</div>
<div id="adressEdit">
<label>Morada: </label> <input type="text" id="adress"></br>
</div>
<input type="button" value="Editar Perfil" id="editProfile" class="submit1">
<input type="hidden" id='idPatientProfile' value="<?=$_SESSION['idPatient']?>"/>
<?php
}
?>
  </div>
</div>


<?php
include '../footer.php';

?>
