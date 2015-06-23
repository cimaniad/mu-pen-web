
$(document).ready(function () {
    var jsonData;
    $.ajax({
        type: "POST",
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'getNotificationByPatient',
            idPatient: $('#idPatientHeader').val()
        },
        statusCode: {
            200: function (response) {
                jsonData = response;
                var i = 0;
                var j = 0;
                var select1 = $('#notMaybe');
                var select2 = $('#consMaybe');
                var select3 = $('#helloMaybe');

                $.each(jsonData, function (index, o) {
                    if (o.idSession > 0) {
                        i++;
                    }
                    if (o.idAppointment > 0) {
                        j++;
                    }
                });
                if (i > 0) {
                    select1.append('(' + i + ')');
                }
                if (j > 0) {
                    select2.append('(' + j + ')');
                    select3.append('('+ j +')');
                }

            },
            500: function (response) {
                console.log(response.msg);
            }
        }
    });
});

function getNotification() {
    $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Notification',
                function: 'getNotificationByPatient',
                idPatient: $('#idPatientNot').val()
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    var pathname = window.location.pathname;
                    var i = 0;
                    if (pathname === '/nep-um-web/Patient/sessions.php') {
                        $.each(jsonData, function (index, o) {
                            if (o.idSession > 0) {
                                i++;
                                deleteNotification(o.idNotification);
                            }
                        });
                        if (i > 1) {
                            alert('Tem ' + i + ' sessões novas por realizar');
                        } else if(i==1){
                            alert('Tem ' + i + ' sessão nova por realizar');
                        }
                    }else if(pathname === '/nep-um-web/Patient/agenda.php'){
                        $.each(jsonData, function (index, o){
                            if(o.idAppointment > 0){
                             alert(o.description);
                             deleteNotification(o.idNotification);
                            }
                        });
                     
                    }
                }
            }
        });
    });
}

function deleteNotification(idNot){
    $.ajax({
        type: 'post',
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'deleteNotification',
            idNotification: idNot
            },
         statusCode: {
             200: function(){
               
             },
             500: function(response){
                 console.log(response.msg);
             }
         }   
    });
}

function addNotificationComment(comment, idPatient, idHP, name, lastName){
        $.ajax({
        type: 'post',
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'createEditNotification',
            idNotification: '0',
            idHealthProfessional: idHP,
            idPatient: idPatient,
            isPatientN: '1',
            idAppointment: '0',
            idSession: '0',
            idComment: comment,
            description: 'Comentário adicionado:' +name+' '+lastName
            },
         statusCode: {
             201: function(){
             window.location.href = "../Patient/sessions.php";
             },
             500: function(response){
                 console.log(response.msg);
             }
         }   
    });
}

function addNotificationAppointment(appointment, idPatient, idHP, name, lastName){
        $.ajax({
        type: 'post',
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'createEditNotification',
            idNotification: '0',
            idHealthProfessional: idHP,
            idPatient: idPatient,
            isPatientN: '1',
            idAppointment: appointment,
            idSession: '0',
            idComment: '0',
            description: 'Consulta adicionada:' +name+' '+lastName
            },
         statusCode: {
             201: function(){
               
             },
             500: function(response){
                 console.log(response.msg);
             }
         }   
    });
}

function addNotificationSession(session, idPatient, idHP, name, lastName){
        $.ajax({
        type: 'post',
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'createEditNotification',
            idNotification: '0',
            idHealthProfessional: idHP,
            idPatient: idPatient,
            isPatientN: '1',
            idAppointment: '0',
            idSession: session,
            idComment: '0',
            description: 'Sessão finalizada:' +name+' '+lastName
            },
         statusCode: {
             201: function(){
               
             },
             500: function(response){
                 console.log(response.msg);
             }
         }   
    });
}

function addNotificationApproveAppointment(appointment, idPatient, idHP, name, lastName){
        $.ajax({
        type: 'post',
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'createEditNotification',
            idNotification: '0',
            idHealthProfessional: idHP,
            idPatient: idPatient,
            isPatientN: '1',
            idAppointment: appointment,
            idSession: '0',
            idComment: '0',
            description: 'Consulta aprovada:' +name+' '+lastName
            },
         statusCode: {
             201: function(){
               
             },
             500: function(response){
                 console.log(response.msg);
             }
         }   
    });
}

function addNotificationCancelAppointment(appointment, idPatient, idHP, name, lastName){
        $.ajax({
        type: 'post',
        url: "http://localhost/nep-um-web/api/",
        dataType: 'json',
        data: {
            object: 'Notification',
            function: 'createEditNotification',
            idNotification: '0',
            idHealthProfessional: idHP,
            idPatient: idPatient,
            isPatientN: '1',
            idAppointment: appointment,
            idSession: '0',
            idComment: '0',
            description: 'Consulta Cancelada:' +name+' '+lastName
            },
         statusCode: {
             201: function(){
              window.location.href = 'scheduleAppointment.php?id='+appointment; 
             },
             500: function(response){
                 console.log(response.msg);
             }
         }   
    });
}