//

$(document).ready(function(){
    $("#scheduleAppointment").click(function () { 
        if (($('#datepicker').val() === '') || ($('#scheduleHour').val() === '') || (!$.trim($('#scheduleDescription').val()))){
            alert('Tem de preencher todos os campos');
        }else {
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Appointment',
                 function: 'saveEditAppointment',
                 idAppointment: '0',
                 date: $('#datepicker').val(),
                 hour: $('#scheduleHour').val(),
                 local: '',
                 patientApproval: '0',
                 healthProfessionalApproval: '0',
                 description: $('#scheduleDescription').val(),
                 idHealthProfessional: $('#healthProfessionalPatient').val(),
                 idPatient: $('#idPatientSchedule').val()
                 },
                    statusCode: {
                        201: function(){
                         alert('Consulta marcada, mas à espera de aprovação');
                          window.location.href = 'agenda.php';
                        },
                        500: function(){
                         alert('Erro na marcação da consulta');
                        }
                    }
                });
            }
    });
});

function healthProfessionalName(){
    $(document).ready(function(){
       var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'HealthProfessional',
                 function: 'getHealthProfessionalById',
                 idHealthProfessional: $('#healthProfessionalPatient').val()
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        $('#healthProfessionalName').text(jsonData.name + ' ' + jsonData.lastName);
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
         });
    });
}

function appointmentsPatient(){
      $(document).ready(function(){
       var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Appointment',
                 function: 'getAllAppointmentsByPatient',
                 idPatient: $('#agendaIdPatient').val()
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                       $('#calendar').fullCalendar(
                                   {
                            height: 300,
                            defaultView: 'basicWeek',
                            
                                   });
                    $.each(jsonData, function (index, o){
                      if(o.patientApproval === '1' && o.healthProfessionalApproval === "1"){
                          var event = {
                              id:1 , title: 'Consulta', start:  o.date+'T'+o.hour, color: 'green', url:  'configAppointment.php?id='+o.idAppointment+'&status=true'
                          };
                       }else if(o.patientApproval === '1'){
                          var event = {
                              id:1 , title: 'Consulta', start:  o.date+'T'+o.hour, color: 'blue', url: 'configAppointment.php?id='+o.idAppointment+'&status=true' 
                          };
                           
                       }else {
                            var event = {
                              id:1 , title: 'Consulta', start:  o.date+'T'+o.hour, color: 'red', url: 'configAppointment.php?id='+o.idAppointment+'&status=false'
                          };
                       }
                         $('#calendar').fullCalendar( 'renderEvent', event, true);  
            });
                                
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
         });
    });
}

function appointmentById(){
    $(document).ready(function(){
       var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Appointment',
                 function: 'getAppointmentById',
                 idAppointment: $('#idAppointmentConfig').val()
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        $('#dateConfig').text(jsonData.date);
                        $('#hourConfig').text(jsonData.hour);
                        $('#descriptionConfig').text(jsonData.description);
                        $('#idPatientConfig').text(jsonData.idPatient);
                        $('#healthProfessionalApprovalConfig').text(jsonData.healthProfessionalApproval);
                        $('#localConfig').text(jsonData.local);
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
         });
    });
}
  
$(document).ready(function(){
    $("#approveSchedule").click(function () { 
        var id = $('#idAppointmentConfig').val();
        $.ajax( 
                {
                  type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Appointment',
                 function: 'saveEditAppointment',
                 idAppointment: $('#idAppointmentConfig').val(),
                 date: $('#dateConfig').text(),
                 hour: $('#hourConfig').text(),
                 local: $('#localConfig').text(),
                 patientApproval: '1',
                 healthProfessionalApproval: $('#healthProfessionalApprovalConfig').text(),
                 description: $('#descriptionConfig').text(),
                 idHealthProfessional: $('#healthProfessionalPatient').val(),
                 idPatient: $('#idPatientConfig').text()
                 },
                    statusCode: {
                        201: function(){
                         alert('Consulta aprovada com sucesso');
                         window.location.href = 'agenda.php';
                        },
                        500: function(){
                            console.log('BD Error');
                        }
                    }
                });
    });
});  