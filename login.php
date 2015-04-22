<?php
include 'header.php';
include 'sessao.php';

if (isset($_POST['email'], $_POST['password'])) {   
    $email = $_POST['email'];
    $password = $_POST['password'];
	validateLogin($email, $password);
}

?>

<div id="banner" align="center"  style=" height: 351px;">
    <div class="login-card">     


        <h1> Login</h1>
        </br>
        <form method="POST">
            <label> Endereço de Email: <input type="text" name="email" class="txt" required /> </label>
            </br>
            <label> Palavra Passe: <input type="password" name="password" class="txt" required/> </label>
            <input type="submit" value="Submeter" class="orange"/>
            <p> <a href="#">Esqueceu-se da password?</p>
            
        </form>
    </div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>
