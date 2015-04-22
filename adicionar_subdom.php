<?php
require_once 'header.php';
?>
<h1 class="help">Adicionar Sub-Domínio</h1>
<form method="post">
<div class="nome_dom">
    <label>
        Nome: <input type="text" class="caixa_exerc"/>
    </label>
</div>
<div class="dom_subdom">
    <label>
        Dominio:
        <select class="box_exerc">
            <option>Visão</option>
            <option>Memória</option>
            <option>Atenção</option>
        </select>
    </label>
</div>
    <input type="submit" class="submit1" value="Guardar"/>
     <input type="submit" class="submit2" value="Cancelar"/>
 </form>
  </div>
</div>

<?php
require_once 'footer.php';
?>
