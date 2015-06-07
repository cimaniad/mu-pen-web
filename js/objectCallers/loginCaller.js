//api caller to login for any user on the website
$(document).ready(function () {
        $("#login").click(function () {
            var jsonData;
            $.ajax(
                    {
                        type: "POST",
                        url: "http://localhost/nep-um-web/api/",
                        dataType: 'json',
                        data: {
                        object: 'Login',
                        function: 'validateLogin',
                        email: $('#email').val(),
                        password: $('#password').val()
                        
                    },
                statusCode: {
                    200: function(response){
                        jsonData = response;
                   $.get("http://localhost/nep-um-web/session.php", {
                             email:jsonData.email,
                             idAdmin:jsonData.idAdmin,
                             idPatient: jsonData.idPatient,
                             healthProfessional: jsonData.healthProfessional,
                             idHealthProfessional: jsonData.idHealthProfessional,
                             name:jsonData.name,
                             developmentProfessional: jsonData.developmentProfessional
                    },
                    function(){
                       window.location.href = 'redirectUser.php';
                    });
                    
                },
                    401: function(){
                        alert("Password Incorreta");
                    },
                    404: function(){
                        alert("E-mail Incorreto");
                    },
                    400: function(){
                        console.log("");
                    }
                }
              
    });

        });
          
    });

