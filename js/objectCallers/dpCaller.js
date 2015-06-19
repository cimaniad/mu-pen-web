function getDpProfile(){
 $(document).ready(function () {
             var jsonData; 
                     $.ajax(
                    {
                        type: "POST",
                        url: "http://localhost/nep-um-web/api/",
                        dataType: 'json',
                        data: {
                        object: 'HealthProfessional',
                        function: 'getHealthProfessionalById',
                        idHealthProfessional: $('#idDPProfile').val()
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
                },                  
                   404: function(){
                        console.log("Patient does not exist");
                    }
                }
              });
          });
      }

