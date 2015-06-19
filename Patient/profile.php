<<<<<<< HEAD
<<<<<<< HEAD:Patient/profile.php
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
<p><span id='normal'>Nome do Cliente:</span> <span id='nameProfile'></p><img src="../imagens/perfil.jpeg" alt="Erro" class="merp" width="125px" height="100px">
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

<?php
}
?>
  </div>
</div>


<?php
include '../footer.php';

?>
=======
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
<p><span id='normal'>Nome do Cliente:</span> <span id='nameProfile'></p><img src="../imagens/perfil.jpeg" alt="Erro" class="merp" width="125px" height="100px">
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

<?php
}
?>
  </div>
</div>


<?php
include '../footer.php';

?>
>>>>>>> 71cc2afb78d1bb39a162356be60151c72c3e5107:Patient/profile.php
=======
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

<?php
}
?>
  </div>
</div>


<?php
include '../footer.php';

?>
>>>>>>> 90f42c2bacc41c70544f67cb000b31fe74afef94
