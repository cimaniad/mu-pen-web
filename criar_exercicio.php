<?php
require_once 'header.php';
?>
<h1 class="help">Criar Exercício</h1>
</br>
</br>
<form method="get">
<div id="dom">
    <label>
        Escolher Dominio: 
        <select class="box_exerc" name="dom">
            <option>Reconhecimeto Emocional</option>
            <option>Visão</option>
            <option>Memória</option>
            <option>Atenção</option>
        </select>
    </label>
</div>
    </br>
<div class="sub-dom">
    <label>
        Escolher Sub-Dominio:
        <select class="box_exerc" name="sub_dom"> 
            <option>TA</option>
            <option>TB</option>
            <option>TC</option>
        </select>
    </label>
</div>
    </br>
<div class="nome_exerc">
    <label>
         Nome: <input type="text" name="nome" class="caixa_exerc"/>
    </label>
</div>
    </br>
  
<div class="descricao">
    <label class="lab">
        Descrição:    </label>
            <textarea type="text" name="descricao" rows="5" cols="21" class="area_exer"></textarea>
      
</div>    
</br>
<div class="estrut">
    <label>
        Escolher Estrutura:
        <select class="box_exerc" name="estrutura">
             <option>Escolha Múltipla</option>
             <option>Sequenciação</option>
             <option>Queda de Objetos</option>
        </select>
    </label>
</div>
</br>
<div class="nivel_exer">
    <label>
        Nível de Dificuldade:
        <select class="box_exerc" name="nivel">
             <option value="1">1 - Nível de Dificuldade Baixo</option>
             <option value="2">2 - Nível de Dificuldade Médio-Baixo</option>
             <option value="3">3 - Nível de Dificuldade Médio</option>
             <option value="4">4 - Nível de Dificuldade Médio-Alto</option>
             <option value="5">5 - Nível de Dificuldade Alto</option>
        </select>
    </label>
</div>
</br>
<div class="tempo_exer">
    <label>
        Tempo(hh:mm:ss):
         <input type="text" name="temp" class="box_exerc">
    </label>
    </br>
</div>
<div class="rad">
    <input type="radio" name="tempo" value="pad"> Tempo Padrão
    <input type="radio" name="tempo" value="lim">  Tempo Limite 
</div>
</br>

        <input type="submit" class="submit1" value="Configurar Exercício" formaction="configurar_exercicio.php"/>
        <input type="submit" class="submit2" value="Cancelar"/>
    </form>

  </div>
</div>

<?php
require_once 'footer.php';
?>
