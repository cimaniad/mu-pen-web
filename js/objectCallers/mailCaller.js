$(document).ready(function(){
    $("#recoverPassword").click(function () { 
        if (($('#emailRecover').val() === '')){
            alert('Tem de preencher o campo Email');
        }else {
            alert($('#emailRecover').val());
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
                 subject: 'ola',
                 message: 'fsafsafsfa'
                 }
                 
            });
          }
    });
});


