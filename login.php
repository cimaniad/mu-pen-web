<?php

include 'header.php';
include 'sessao.php';

//if (isset($_POST['email'], $_POST['password'])) {
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    validateLogin($email, $password);
//}
?>
<script src="js/libs/jquery/jquery.js" type="text/javascript"></script>
<script>
    $("#foo").submit(function(event) {

        // Abort any pending request
        if (request) {
            request.abort();
        }
        // setup some local variables
        var $form = $(this);

        // Let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");

        // Serialize the data in the form
        var serializedData = $form.serialize();
// Let's disable the inputs for the duration of the Ajax request.
        // Note: we disable elements AFTER the form data has been serialized.
        // Disabled form elements will not be serialized.
        $inputs.prop("disabled", true);
        // Fire off the request to /form.php
        request = $.ajax({
            url: "http://localhost/mu-pen-web/api/",
            type: "post",
            data: serializedData,
        });
        // Callback handler that will be called on success
        request.done(function(response, textStatus, jqXHR) {
            // Log a message to the console
            $("#p").text("Hooray, it worked!");
        });
        // Callback handler that will be called on failure
        request.fail(function(jqXHR, textStatus, errorThrown) {
            // Log the error to the console
            $("#p1").text(
                    "The following error occurred: " +
                    textStatus, errorThrown
                    );
        });
        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function() {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
        // Prevent default posting of form
        event.preventDefault();
    });
</script>
<div id="banner" align="center"  style=" height: 351px;">
    <div class="login-card">     


        <h1> Login</h1>
        </br>
        <form id="foo" >
            <label> Endereço de Email: <input type="text" name="email" class="txt" required /> </label>
            </br>
            <label> Palavra Passe: <input type="password" name="password" class="txt" required/> </label>
            <input type="submit" value="Submeter" class="orange"/>
            <p> <a href="#">Esqueceu-se da password?</p>
            <p id="p"><p>
            <p id="p1"><p>
        </form>
    </div>
</div>
</div>
</div>
<?php

include 'footer.php';
?>
