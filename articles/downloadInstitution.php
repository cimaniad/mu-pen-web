<?php
require_once '../session.php';
if(isset($_SESSION['idHealthProfessional'])){
require_once '../HealthProfessional/headerDP.php';
}else if(isset($_SESSION['idAdmin'])){
require_once '../Admin/headerAdmin.php';
}else if(isset($_SESSION['idPatient'])){
    require_once '../Patient/headerPatient.php';
}else {
    require_once '../anon/header.php';
}

?>


<h1 class="help">Aplicação JAVA</h1>
<p>Nesta secção é fornecida a possibilidade dos utilizadores descarregarem a <strong>aplicação JAVA.</strong</p></br>
    <?php
$path = "../javaapplication/"; 
$diretorio = dir($path);  
while($arquivo = $diretorio -> read())
        { 
    if($arquivo != '.' && $arquivo != '..')
    {echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br/>"; 

} 
        }
        $diretorio -> close();
?>

<h1 class="help">Manual de Utilizador</h1>
<p>Nesta secção é fornecida a possibilidade dos utilizadores descarregarem o <strong>Manual do Utilizador.</strong</p>
    <?php
$path = "../manual/"; 
$diretorio = dir($path);  
while($arquivo = $diretorio -> read())
        { 
    if($arquivo != '.' && $arquivo != '..')
    {echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />"; 

} 
        }
        $diretorio -> close();
?>

<h1 class="help">Vídeo</h1>
<iframe width="560" height="315" src="https://www.youtube.com/embed/w81g199L8YA" frameborder="0" allowfullscreen></iframe>
        