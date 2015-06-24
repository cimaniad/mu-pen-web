<?php
require_once '../session.php';
if(isset($_SESSION['idHealthProfessional'])){
require_once '../HealthProfessional/headerDP.php';
}else if(isset($_SESSION['idAdmin'])){
require_once '../Admin/headerAdmin.php';
}
?>
<?php
error_reporting(0);
?>

<?php
$target_dir = "../pdfs/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== true) {
        $uploadOk = 1;
    } else {
        echo "<script>window.alert('O ficheiro não é um artigo!')</script>";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "<script>window.alert('O ficheiro já existe!')</script>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000000000) {
    echo "<script>window.alert('O ficheiro é muito comprido!')</script>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "<script>window.alert('Apenas ficheiros de pdf são permitidos!')</script>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<script>window.alert('Desculpe, o ficheiro não foi carregado!')</script>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<script>window.alert('O ficheiro ". basename( $_FILES["fileToUpload"]["name"]). " foi carregado com sucesso!')</script";
    } else {
        echo "<script>window.alert('Desculpe, ocorreu um erro ao carregar o ficheiro')</script>";
    }
}
}
?>

<h1 class="help">Adicionar Artigos</h1>
<p>Através desta interface é possível <strong>publicar artigos</strong> no site, sendo que estes <strong>podem ser vistos
        pelos diferentes tipos de utilizadores.</strong></p>
        
        

        <div class="box1">
            <form method="post" enctype="multipart/form-data">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input style="margin-top: 18px; margin-left: 5px;" name="fileToUpload" type="file" id="fileToUpload"> 
<input name="submit" type="submit" id="timonBurro" class="orange" value="Upload">
</form>
        </div>
            