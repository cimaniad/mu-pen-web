$(document).ready(function () {
    $("#recoverPassword").click(function () {
        var jsonData;
        if (($('#emailRecover').val() === '') || $('#numCcRecover').val() === '') {
            alert('Tem de preencher todos os campos');
        } else {
            $.ajax({
                type: "Post",
                url: "http://localhost/nep-um-web/api/",
                dataType: 'json',
                data: {
                    object: 'Login',
                    function: 'getPassword',
                    email: $('#emailRecover').val(),
                    numCc: $('#numCcRecover').val()
                },
                statusCode: {
                    200: function (response) {
                        jsonData = response;
                        $.ajax(
                                {
                                    type: "POST",
                                    url: "http://localhost/nep-um-web/api/",
                                    dataType: 'json',
                                    data: {
                                        object: 'sendMail',
                                        function: 'sendMail',
                                        email: $('#emailRecover').val(),
                                        name: 'fsafas',
                                        subject: 'Recuperar Password',
                                        message: 'A sua password é ' + jsonData.password
                                    }
                                });
                        alert('Email enviado');
                    },
                    404: function () {
                        alert('Utilizador não encontrado');
                    }
                }
            });
        }
    });
});

