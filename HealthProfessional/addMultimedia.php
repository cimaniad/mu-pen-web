<?php
require_once 'headerDP.php';

if (isset($_POST['name'])) {
    $idDirectory = $_POST['directory'];
    $namefolder = $_POST['nameDirectory'];
    $name = $_POST['name'];

    $image = $_FILES['image']['name'];
    $file_tmp = $_FILES['image']['tmp_name'];
        error_reporting(E_ERROR | E_PARSE);
//    $image = $_POST['image'];
    ?>
    <input id="allDirectory" value="<?=$idDirectory?>" type="hidden">
    <input id="name_multimedia" value="<?=$name?>" type="hidden">
    <input id="addMultimediaDirectory" value="<?=$image?>" type="hidden">
    <input id="nameDirectory" value="<?=$namefolder?>" type="hidden">
    <script>
        addMultimedia();
    </script>
<?php
   $path = '../api/images/ExercisesMultimedia/'.$namefolder.'/'.$image;
   move_uploaded_file($file_tmp, $path);
}
?>

<script>getDirectory();</script>
<h1 class="help"> Inserir Multimédia</h1>
</br>
<form method="post" enctype="multipart/form-data">
    <div id="directory">
        <label>
            Diretoria:
            <select id="allDirectory" name="directory">
                <option>Escolher Diretoria</option>
            </select>

        </label>
    </div> 
    </br></br>
    <div class="insert_multimedia_name"> 
        <label>
            Nome:

            <input type="text" id="name_multimedia" name="name" >
        </label>

    </div>
    </br></br>
    <div class="insert_multimedia"> 
        <label>
            Seleccione um ficheiro de multimédia para adicionar:
            </br></br>
            <input type="file" id="addMultimediaDirectory" name="image">
        </label>

    </div>
    <input class="submit3" type="submit" value="Guardar" id="addMultimediaBD"/>

    <input class="submit2" type="submit" value="Cancelar"/>
</form>