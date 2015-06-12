//add Domain when the Guardar button is pressed
$(document).ready(function(){
    $("#addDomain").click(function () { 
        if (($('#nameDomain').val() === '') || (!$.trim($('#descriptionDomain').val()))){
            alert('Tem de preencher todos os campos');
        }else { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Domain',
                 function: 'addEditDomain',
                 name: $('#nameDomain').val(),
                 description: $('#descriptionDomain').val(),
                 idDomain: '0'
                 },
                    statusCode: {
                        201: function(){
                         alert('Dominio adicionado com sucesso');   
                        },
                        500: function(){
                            alert('Erro a criar o Domínio');
                        },
                        501: function(){
                            alert('Nome de Dominio já existe');
                        }
                    }
                });
            }
    });
});

//code to add a SubDomain do the dababase
$(document).ready(function(){
    $("#addSubDomain").click(function () {
           if (($('#nameSubDomain').val() === '') || (!$.trim($('#subDomainDescription').val()))){
            alert('Tem de preencher todos os campos');
        }else { 
        $.ajax(
                {
                    type:"Post",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: { 
                    object:'SubDomain',
                    function: 'addEditSubDomain',
                    idSubDomain: '0',
                    idDomain: $("#allDomains").val(),
                    name: $("#nameSubDomain").val(),
                    description: $("#subDomainDescription").val()
                    },
                    statusCode: {
                        201: function(){
                            alert("Sub-Dominio adicionado com sucesso!");
                            
                        },
                        501: function(){
                            alert("Sub-Dominio com esse nome jรก existe");
                        },
                        500: function() {
                            alert("Erro ao adicionar Sub-dominio");
                        }
                    }
               
        });
         }
     });   
});

//get all domains to put them in a Select box
function getDomains(){
    $(document).ready(function(){
        var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Domain',
                 function: 'getDomains'
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        var $select = $("#allDomains");
                           $.each(jsonData, function (index, o) {    
                           $select.append('<option value="' + o.idDomain + '">' + o.name + '</option>');
                       });
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
       }); 
    });
}

//get one Domain so we can edit him
$(document).ready(function(){
    $("#allDomains").change(function () {
        var jsonData;
        $.ajax(
                {
                    type:"Post",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: { 
                    object:'Domain',
                    function: 'getDomainById',
                    idDomain: $('#allDomains').val()
                    },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        $('#nameEditDomain').val(jsonData.name).change();
                        $('#descriptionEditDomain').val(jsonData.description).change();
                             },
                        404: function(){
                            console.log("BD Error");
                        $('#nameEditDomain').val("").change();
                        $('#descriptionEditDomain').val("").change();
                        }
                    }
                
        });
     });   
});

//Get a subdomain and edit him
$(document).ready(function(){
    $("#allSubDomains").change(function () {
        var jsonData;
        $.ajax(
                {
                    type:"Post",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: { 
                    object:'SubDomain',
                    function: 'getSubDomainById',
                    idSubDomain: $('#allSubDomains').val()
                    },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        $('#nameEditSubDomain').val(jsonData.name).change();
                        $('#subDomainEditDescription').val(jsonData.description).change();
                        $('#allDomains').val(jsonData.idDomain).change();
                             },
                        404: function(){
                            console.log("BD Error");
                        $('#nameEditSubDomain').val("").change();
                        $('#subDomainEditDescription').val("").change();
                        }
                    }
                
        });
     });   
});

//Edit Domain 
$(document).ready(function(){
    $("#editDomain").click(function () { 
        if (($('#nameEditDomain').val() === '') || (!$.trim($('#descriptionEditDomain').val()))){
            alert('Tem de preencher todos os campos');
        }else { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Domain',
                 function: 'addEditDomain',
                 name: $('#nameEditDomain').val(),
                 description: $('#descriptionEditDomain').val(),
                 idDomain: $('#allDomains').val()
                 },
                    statusCode: {
                        201: function(){
                         alert('Dominio editado com sucesso');   
                        },
                        404: function(){
                           console.log("BD Error");
                        }
                    }
                });
            }
    });
});

//Edit Sub-Domain 
$(document).ready(function(){
    $("#editSubDomain").click(function () { 
          if (($('#nameEditSubDomain').val() === '') || (!$.trim($('#subDomainEditDescription').val()))){
            alert('Tem de preencher todos os campos');
        }else {       
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'SubDomain',
                 function: 'addEditSubDomain',
                 idSubDomain: $("#allSubDomains").val(),
                 name: $('#nameEditSubDomain').val(),
                 description: $('#subDomainEditDescription').val(),
                 idDomain: $('#allDomains').val()
                 },
                    statusCode: {
                        201: function(){
                         alert('Sub-Dominio editado com sucesso');   
                        },
                        404: function(){
                           console.log("BD Error");
                        }
                    }
                });
            }
    });
});
//Delete a domain
$(document).ready(function(){
    $("#deleteDomain").click(function () { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Domain',
                 function: 'deleteDomain',
                 idDomain: $('#allDomains').val()
                 },
                    statusCode: {
                        200: function(){
                         alert('Dominio eliminado com sucesso');
                          window.location.href = 'addEditDomain.php?id=2'; 
                        },
                        500: function(){
                          console.log('BD error');

                        }
                    }
                });
    });
});

//Delete a subdomain
$(document).ready(function(){
    $("#deleteSubDomain").click(function () { 
        $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'SubDomain',
                 function: 'deleteSubDomain',
                 idSubDomain: $('#allSubDomains').val()
                 },
                    statusCode: {
                        200: function(){
                         alert('Sub-Dominio eliminado com sucesso'); 
                         window.location.href = 'addEditSubDomain.php?id=2'; 
                        },
                        500: function(){
                            console.error("BD error");
                        }
                    }
                });
    });
});

//get all subdomains in a select box
function getAllSubDomains(){
   $(document).ready(function(){
      var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'SubDomain',
                 function: 'getSubDomains'
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        var $select = $("#allSubDomains");
                           $.each(jsonData, function (index, o) {    
                           $select.append('<option value="' + o.idSubDomain + '">' + o.name + '</option>');
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
     $("#allDomains").change(function () {
      var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'SubDomain',
                 function: 'getSubDomainByDomain',
                 idDomain: $('#allDomains').val()
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        var $select = $("#subDomainsExercise");
                           $select.empty();
                           $.each(jsonData, function (index, o){    
                           $select.append('<option value="' + o.idSubDomain + '">' + o.name + '</option>');
                       });
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
       }); 
    });
  });