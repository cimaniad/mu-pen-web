//add Domain when the Guardar button is pressed
$(document).ready(function(){
    $("#addInformation").click(function () { 
        if (($('#contentInfo').val() === '') || (!$.trim($('#titleInfo').val()))){
            alert('Tem de preencher todos os campos');
        }else { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'information',
                 function: 'addEditInformation',
                 content: $('#contentInfo').val(),
                 title: $('#titleInfo').val(),
                 idInformation: '0'
                 },
                    statusCode: {
                        201: function(){
                         alert('Informaçao adicionada com sucesso'); 
                         window.location.href = '../articles/consultInformation.php'; 
                        },
                        500: function(){
                            alert('Erro ao adicionar Informação');
                        }
                    }
                });
            }
    });
});

function getInformation(){
    $(document).ready(function(){
        var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'information',
                 function: 'getInformation'
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        var $select = $("#allInformation");
                        $select.empty();
                        $select.append('<option>Escolher Informação</option>');
                           $.each(jsonData, function (index, o) {    
                           $select.append('<option value="' + o.idInformation + '">' + o.title + '</o>');
                       });
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
       }); 
    });
}

$(document).ready(function(){
    $("#allInformation").change(function () {
        var jsonData;
        $.ajax(
                {
                    type:"Post",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: { 
                    object:'information',
                    function: 'getInformationById',
                    idInformation: $('#allInformation').val()
                    },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        if(getUrlParameter('id') == 2){
                        $('#titleEditInformation').val(jsonData.title).change();
                        $('#contentEditInformation').val(jsonData.content).change();
                    }else {
                        var select = $("#titleInfo");
                        select.empty();
                        var input = $('<h1 class="help">'+jsonData.title+'</h1>');
                        select.append(input);
                        var select = $("#contentInfo");
                        select.empty();
                        var input = $('<p>' +jsonData.content +'</p>');
                        select.append(input);
                        
                    }
                             },
                        404: function(){
                            console.log("BD Error");
                        $('#titleEditInformation').val("").change();
                        $('#contentEditInformation').val("").change();
                        }
                    }
                
        });
     });   
});

$(document).ready(function(){
    $("#editInformation").click(function () { 
        if (($('#contentEditInformation').val() === '')){
            alert('Tem de preencher todos os campos');
        }else { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'information',
                 function: 'addEditInformation',
                 content: $('#contentEditInformation').val(),
                 title: $('#titleEditInformation').val(),
                 idInformation: $('#allInformation').val()
                 },
                    statusCode: {
                        201: function(){
                         alert('Informação editada com sucesso');  
                          window.location.href = 'addInformation.php?id=2';                          
                        },
                        404: function(){
                           console.log("BD Error");
                        }
                    }
                });
            }
    });
});

$(document).ready(function(){
    $("#deleteInformation").click(function () { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'information',
                 function: 'deleteInformation',
                 idInformation: $('#allInformation').val()
                 },
                    statusCode: {
                        200: function(){
                         alert('Informação eliminada com sucesso');
                          window.location.href = 'addInformation.php?id=2'; 
                        },
                        500: function(){
                          console.log('BD error');

                        }
                    }
                });
    });
});
