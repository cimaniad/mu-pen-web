<?php
require_once 'headerDP.php';

if(isset($_POST['directory'])){
    $id = $_POST['directory'];
    $nameFolder = $_POST['nameDirectory'];
    ?>
   <input id="allDirectory" value="<?=$id?>" type="hidden">
   <script>
       deleteDirectory();
   </script>
<?php
    $path = '../api/images/ExercisesMultimedia/'.$nameFolder;
        error_reporting(E_ERROR | E_PARSE);
    rmdir($path);
}
?>

<h1 class="help">Eliminar Diretoria</h1>
<script>
    getDirectory();
    </script>
    <form method="post">
<div>
    <label>Escolher Diretoria:</label>
    <select id="allDirectory" name="directory" class="boxExerc">
          <option>Escolher Diretoria</option>
    </select>
       <div id="directory"></div>

</div>
        <input type="submit" value="Cancelar" class="submit1" formaction="headerDP.php">
    <input type="submit" id="deleteDirectory" value="Eliminar" class="submit2">
    </form>