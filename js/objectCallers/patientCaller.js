//api caller to get the patient profile 
function getPatientProfile() {
    $(document).ready(function () {
        var jsonData;
        $.ajax(
                {
                    type: "POST",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: {
                        object: 'Patient',
                        function: 'getPatientById',
                        idPatient: $('#idPatientProfile').val()
                    },
                    statusCode: {
                        200: function (response) {
                            jsonData = response;
                            $('#nameProfile').text(jsonData.name + ' ' + jsonData.lastName);
                            $('#dataProfile').text(jsonData.birthDate);
                            $('#genderProfile').text(jsonData.gender);
                            $('#nifProfile').text(jsonData.nif);
                            $('#adressProfile').text(jsonData.adress);
                            $('#emailProfile').text(jsonData.email);
                            $('#numberProfile').text(jsonData.numTel);
                            $('#ccProfile').text(jsonData.numCC);
                            $('#maritalStateProfile').text(jsonData.maritalStatus);
                            $('#nationalityProfile').text(jsonData.nationality);
                            $('#bloodGroupProfile').text(jsonData.bloodGroup);
                            $('#pathologyProfile').text(jsonData.pathology);
                        },
                        404: function () {
                            console.log("Patient does not exist");
                        }
                    }
                });
    });
}

function getInfoPatient() {
    $(document).ready(function () {
        var jsonData;
        $.ajax(
                {
                    type: "POST",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: {
                        object: 'Patient',
                        function: 'getPatientById',
                        idPatient: $('#idPatientProfile').val()
                    },
                    statusCode: {
                        200: function (response) {
                            jsonData = response;
                            $('#emailProf').val(jsonData.email);
                            $('#numbTelephone').val(jsonData.numTel);
                            $('#civilState').val(jsonData.maritalStatus);
                            $('#adress').val(jsonData.adress);                            
                        },
                        404: function () {
                            console.log("Patient does not exist");
                        }
                    }
                });
    });
}
$(document).ready(function(){
$('#editProfile').click(function () {
    $.ajax({

            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
            object: 'Patient',
            function: 'editPatientProfile',
            idPatient: $('#idPatientProfile').val(),
            email: $('#emailProf').val(),
            numTel: $('#numbTelephone').val(),
            civilState: $('#civilState').val(),
            adress: $('#adress').val()
            },
            statusCode: {
            201: function () {
                alert('Perfil Editado com sucesso');
            },
                    404: function () {
                        alert('Erro a editar Perfil');
                        console.log("Patient does not exist");
                    }
            }
    });
});
});