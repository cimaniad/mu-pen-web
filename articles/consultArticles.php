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

<h1 class="help">Lista de Artigos</h1>
<p>Nesta página poderá <strong>encontrar artigos</strong> relativos a <strong>patologias</strong> e <strong>informações</strong>, <strong>entre outros temas </strong</p></br>
    <?php
$path = "../pdfs/"; 
$diretorio = dir($path);  
while($arquivo = $diretorio -> read())
        { 
    if($arquivo != '.' && $arquivo != '..')
    {echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />"; 

} 
        }
        $diretorio -> close();
?>