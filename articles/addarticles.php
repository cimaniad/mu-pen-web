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
        echo "O ficheiro não é um artigo!";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "O ficheiro já existe!";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000000000) {
    echo "O ficheiro é muito comprido!";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "Apenas ficheiros de pdf são permitidos!";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Desculpe, o ficheiro não foi carregado!";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "O ficheiro ". basename( $_FILES["fileToUpload"]["name"]). " foi carregado com sucesso!";
    } else {
        echo "Desculpe, ocorreu um erro ao carregar o ficheiro";
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
<input style="margin-left: 130px" name="submit" type="submit" class="orange" value=" Upload ">
</form>
        </div>
            