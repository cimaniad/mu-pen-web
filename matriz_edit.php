<?php
require_once 'index_teste.php';
require_once 'session.php';
confirm_admin();
?>

<?php
    if($_GET['id']==1){
?>
<h1 class="help">Editar Matriz</h1>
<p>Escolha o número de Colunas e Linhas que a matriz deve possuir inicialmente</p>
<form method="get" action="Matriz.php">
            NºColunas/Linhas: <input type="number" name="col" min="2" max="6" />
            </br>
            </br>
            <input type="submit" value="Começar Jogo" class="orange"/>
       
         </form>
    <?php
        }
    ?>
    <?php
        if($_GET['id']==2){
    ?>
<h1 class="help">Editar exercício</h1>
<p>Escolha o número de imagens que o exercício deve possuir, assim como o tempo que as imagens demoram a desaparecer</p>
<form method="get" action="Pairs.php">
     Número de Imagens: 
     <select name="image_number">
        <option value="3">3</option>
        <option value="6">6</option>
        <option value="10">10</option>
    </select>
        </br>
        </br>
        Tempo Inicial(segundos): <input type=number name="initial_time" class="box_pares" placeholder="0" required min="1" max="5">
            </br>
            </br>
            <input type="submit" value="Começar Jogo" class="orange"/>
       
         </form>
<?php
}
?>
    </body>
    </div>
</div>
</html>
