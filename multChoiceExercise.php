<?php
require_once 'header.php';
?>
 <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
 <link rel="stylesheet" type="text/css" href="js/extra/iCheck-1.x/skins/flat/orange.css" title="style" />
 <script type="text/javascript" src="js/extra/iCheck-1.x/icheck.js"></script>
<script>


</script>
<form method='get'>
<div id="caixa_em">
        <h4 class='help'>Seleccione a opção que represente a emoção expressa na imagem seguinte</h4>
    </div>   
        <div class="caixa_em1">
            <img src="imagens/medo.jpeg" width="150px" height="200px" alt='Erro' class='imagem_em'>
        </div>

<div class='estrutura_em'>
    <div class='est_em'>
        <input type='radio' name='option' value='1' > 
         <label>Nojo </label>
    </div></br>
    <div class='est_em'>
    <input type='radio' name='option' value='2'> 
    <label> Medo </label>
    </div></br>
    <div class='est_em'>
   <input type='radio' name='option' value='3'> 
     <label> Alegria </label>
    </div></br>
</div>
    <input type='submit' value='Submeter Resposta' class='submit4'>
</form>
        </div>
    </div>
<?php
require_once 'footer.php';
?>