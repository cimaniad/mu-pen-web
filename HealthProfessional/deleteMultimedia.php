<?php
require_once 'headerDP.php';

if(isset($_POST['directory'])){
    $directory = $_POST['directory'];
    $nameFolder = $_POST['nameDirectory'];
    $idImage = $_POST['image'];
    $image = $_POST['nameImage'];
    unlink('../api/images/ExercisesMultimedia/'.$nameFolder.'/'.$image.'.jpg');
  ?>
    <input type="hidden" id="imageID" value="<?=$idImage?>">
    <script>
        deleteMultimedia();
    </script>
    
<?php
}
?>

<h1 class="help">Eliminar Multimédia</h1>

<script>getDirectory2();</script>
<h4 class="help">Escolher Imagem</h4>
<form method="POST">
    <select id="dude" name="directory">
        <option>Escolha Diretoria</option>
    </select>
    </br>
       </br>
             <select id="imageChoice" name="image">
                 <option>Escolher Imagem</option>
             </select>
       <div id="directory"></div>  
       <input type="submit" value="Eliminar Imagem" class="submit1" id="deleteImage">
</form>
