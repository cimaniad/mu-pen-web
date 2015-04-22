<?php
require_once 'header.php';
?>
 <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
 <link rel="stylesheet" type="text/css" href="js/iCheck-1.x/skins/flat/orange.css" title="style" />
 <script type="text/javascript" src="js/iCheck-1.x/icheck.js"></script>
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat',
    radioClass: 'iradio_flat',
    increaseArea: '20%' // optional
  });
});

$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-orange',
    radioClass: 'iradio_flat-orange',
    increaseArea: '20%' // optional
  });
});

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
        <input type='radio' name='opcao' value='1' class='yourmother'> 
         <label>Nojo </label>
    </div></br>
    <div class='est_em'>
    <input type='radio' name='opcao' value='2' class='yourmother'> 
    <label> Medo </label>
    </div></br>
    <div class='est_em'>
   <input type='radio' name='opcao' value='3' class='yourmother'> 
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