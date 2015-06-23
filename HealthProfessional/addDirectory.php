<?php
require_once 'headerDP.php';

if(isset($_POST['nameDirectory'])) {
    $nameFolder = $_POST['nameDirectory'];
    $path = '../api/images/ExercisesMultimedia/'.$nameFolder;
    ?>
        <input type="hidden" value="<?=$_POST['nameDirectory']?>" id="nameDirectory">
        <script>
          addDirectory();
        </script>
  <?php
    error_reporting(E_ERROR | E_PARSE);
    mkdir($path);
    }
?>
<h1 class="help">Adicionar Diretoria</h1>
</br>
<form method="post" id="addDirectory">
  
        <label>Nome: </label>
         <input type="text" name="nameDirectory"></br></br>
         <input type="submit" value="Cancelar" formaction="headerDP.php" class="submit1">    
         <input type="submit" name="submit" class="submit2"/>
</form>
        </div>
        </div>
<?php
require_once '../footer.php';
