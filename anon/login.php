<?php
include '../anon/header.php';
require_once '../session.php';
?>

<div id="banner" align="center"  style=" height: 351px;">
    <div class="login-card">     


        <h1> Login</h1>
        </br>
        <form method="POST">
            <label> Endereço de Email: <input type="text" id="email" name="email" class="txt" required /> </label>
            </br>
            <label> Palavra Passe: <input type="password" id="password" name="password" class="txt" required/> </label>
            <input type="button" value="Submeter" id="login" class="orange"/>
            <p> <a href="recoverPassword.php">Esqueceu-se da password?</p>
        </form>     
    </div>
</div>

</div>
</div>

