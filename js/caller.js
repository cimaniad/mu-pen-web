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
                             idHealthProfessional: jsonData.idHealthProfessional,
                             name:jsonData.name                           
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

function getPatientProfile(){
 $(document).ready(function () {
             var jsonData; 
                     $.ajax(
                    {
                        type: "POST",
                        url: "http://localhost/nep-um-web/api/",
                        dataType: 'json',
                        data: {
                        object: 'Patient',
                        function: 'getPatient',
                        idPatient: $('#idPatientProfile').val()
                      },
                statusCode: {
                    200: function(response){
                        jsonData = response;
                        $('#nameProfile').text(jsonData.name + ' ' + jsonData.lastName);
                        $('#dataProfile').text(jsonData.birthDate);
                        $('#genderProfile').text(jsonData.gender);
                        $('#nifProfile').text(jsonData.nif);
                        $('#adressProfile').text(jsonData.adress);
                        $('#emailProfile').text(jsonData.email);
                        $('#numberProfile').text(jsonData.numTel);
                        $('#ccProfile').text(jsonData.numCc);
                        $('#maritalStateProfile').text(jsonData.maritalStatus);
                        $('#nationalityProfile').text(jsonData.nationality);
                        $('#bloodGroupProfile').text(jsonData.bloodGroup);
                        $('#pathologyProfile').text(jsonData.pathology);
                },                  
                   404: function(){
                        console.log("Patient does not exist");
                    }
                }
              
    });
 
      });
      }