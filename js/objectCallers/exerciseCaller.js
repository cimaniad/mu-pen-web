// function drag and drop tags
function makeElementAsDragAndDrop(elem) {
    $(elem).draggable({
        revert: "invalid",
        cursor: "move",
        helper: "clone",
        axis: 'y'
    });
    $(elem).droppable({
        drop: function (event, ui) {
            var $dragElem = $(ui.draggable).clone().replaceAll(this);
            $(this).replaceAll(ui.draggable);
            makeElementAsDragAndDrop(this);
            makeElementAsDragAndDrop($dragElem);
        }
    });
}


$(document).ready(function(){
 
    $("#optionsConfig").change(function () {
         var options = $("#optionsConfig").val();
         var select = $(".config_exercicio");
          select.empty();
         if(getUrlParameter('structure') == 4){  
            for(var i=0; i<options; i++){
            var append = $('<label>Opção: '+(i+1)+'</label> <input type="text" class="caixa_config" id="optionConfig'+i+'"/> <input type="text" style="width: 20px; height:  20px" id="correctConfig'+i+'"/> </br>');
            select.append(append);
         }
        }else if(getUrlParameter('structure') == 5){
            for(var i=0; i<options; i++){
                var append = $('<label>Opção: '+(i+1)+'</label> <input type="text" class="caixa_config" id="optionConfig'+i+'"/> <input type="checkbox" name="correctOption" id="correctConfig'+i+'" value="'+(i+1)+'"/></br>');
                select.append(append);
            }
        }
     });   
});



//Function to add an exercise to the DB when clicking on the button Guardar
$(document).ready(function(){
    $('#createExerciseButton').click(function (){
      if (($('#nameExercise').val() === '') || (!$.trim($('#questionExercise').val()))){
            alert('Tem de preencher os campos Nome e Questão');
        }else {  
        var structure = $('#structureCreateExercise').val();
        var jsonData;  
         $.ajax( 
                {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Exercise',
                 function: 'saveEditExercise',
                 idExercise: '0',
                 idStandardExercise: structure,
                 idSubDomain: $('#subDomainsExercise').val(),
                 name: $('#nameExercise').val(),
                 question: $('#questionExercise').val(),
                 time: $('#timeCreateExercise').val(),
                 level: $('#levelExercise').val(),
                 numMatriz: '0',
                 appearTime: '0',
                 initialTime: '0'
                 },
                    statusCode: {
                        201: function(response){
                         jsonData = response;
                         window.location.href = 'configExercise.php?idEx='+jsonData.idExercise+'&structure='+structure; 
                        },
                        500: function(){
                            alert('Erro a criar o Exercício');
                        },
                        501: function(){
                            alert('Nome de Exercício já existe');
                        }
                    }
                    
                });
            }
    });
});

//function do add the options choosen by the Professional Developer
$(document).ready(function(){
    $('#submitConfigExer').click(function (){
    var options = $("#optionsConfig").val();
    var correct;
    if(getUrlParameter('structure') == 4){ //Sequence Game
    for(var i=0; i<options;i++){
    $.ajax(
            {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Exercise',
                 function: 'saveEditOption',
                 idOption: '0',
                 idExercise: getUrlParameter('idEx'),
                 description: $("#optionConfig"+i).val(),
                 position: $("#correctConfig"+i).val()
                   },
                statusCode: {
                    201: function(){
                    
                    },
                    500: function(response){
                        alert('Erro a adicionar as opções');
                        console.log(response.msg);
                    }
                }   
              });
          }
          alert('Opções adicionadas com sucesso');
      }else if(getUrlParameter('structure') == 5){  //Multiple Choice game
          for(var i=0; i<options;i++){
             if($('#correctConfig'+i+':checked').val()){
               correct = 1;
             }else {
               correct = 0;
             } 
          $.ajax(
            {
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'Exercise',
                 function: 'saveEditOption',
                 idOption: '0',
                 idExercise: getUrlParameter('idEx'),
                 description: $("#optionConfig"+i).val(),
                 correctOpt: correct,
                 position: '0'
                   }
              });
          }
      }else if(getUrlParameter('structure') == 6){ //Pairs Game
          pairsExercise();
      }else if(getUrlParameter('structure') == 3){ //Memory Matrix Game
          matrixMemoryConfig();
      }
      
     });
 });  

//get an exercise by ID
function getExerciseById(){
    $(document).ready(function(){
        var jsonData;
        $.ajax({
           type: "POST",
           url: "http://localhost/nep-um-web/api/",
           dataType: 'json',
           data: {
             object: 'Exercise',
             function: 'getExerciseById',
             idExercise: getUrlParameter('gameChoosen')
           },
           statusCode: {
               200: function(response){  
                 jsonData = response;
                 getOptions();  
                 var select = $('#support');
                 select.append('<h2 class="help">'+jsonData.name+'</h2>');
                 select.append('<h4 class="help">'+jsonData.question+'</h2>');
               }
           }
        }); 
    });
}

 
function getOptionsNumber(){
 $(document).ready(function () {
     var jsonData;
          $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Exercise',
                function: 'countOptions',
                idExercise: getUrlParameter('gameChoosen')      
            },
            statusCode: {
                200:function(response){
                    jsonData = response;
                    var select = $("#support");
                    var input = $('<input type="hidden" id=optionsNumber value="'+jsonData.options+'"/>');
                    select.append(input);
                }
            }
        });
    });   
}
//function to save the results from a exercise played by a Patient NOT FINISHED!!!!!!!!!!!!!!!!!!!!!!
function saveResult(correctAnswer){
    $(document).ready(function () {
        var jsonData;
        $.ajax({
           type: "Post",
           url: "http://localhost/nep-um-web/api/",
           dataType: 'json',
           data:{
           object: 'Answer',
           function: 'saveResult',
           idPatient: '23',
           idExercise: getUrlParameter('gameChoosen'),
           resolutionTime: '0',
           attempts: '1',
           wrongHits: '0',
           rightHits: '0',
           correctAnswer: correctAnswer
           },
           statusCode: {
               201: function(response){
                   jsonData = response;
                  var select = $('#dialogChange');
                  var input = $('<input type="hidden" id="commentAnswerId" value="'+jsonData.idAnswer+'"/>');
                  select.append(input);
                  alert('Resultados Gravados');
                   $('#dialog-form').dialog('open');
               }
           }
        });
    });
}

function getCorrectOptionsNumber(){
 $(document).ready(function () {
     var jsonData;
          $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Exercise',
                function: 'countCorrectOptions',
                idExercise: getUrlParameter('gameChoosen')  
            },
            statusCode: {
                200:function(response){
                    jsonData = response;
                    var select = $(".estrutura_em");
                    var input = $('<input type="hidden" id=correctOptionsNumber value="'+jsonData.answers+'"/>');
                    select.append(input);
                }
            }
        });
    });   
}

//function to config pairs Exercises
function pairsExercise(){
    $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Exercise',
                function: 'editPairsExercise',
                idExercise: getUrlParameter('idEx'),
                idStandardExercise: getUrlParameter('structure'),
                numMatriz: $('#pairsImages').val(),
                appearTime: $('#pairsInitialTime').val(),
                initialTime: '0'
            },
            statusCode: {
                200: function(){
                    alert('Exercício guardado com sucesso');
                },
                500: function(response){
                    console.log(response.msg);
                }
            }
    });
}

function matrixMemoryConfig(){
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Exercise',
                function: 'editPairsExercise',
                idExercise: getUrlParameter('idEx'),
                idStandardExercise: getUrlParameter('structure'),
                numMatriz: $('#colNumber').val(),
                appearTime: '0',
                initialTime: '0'
            },
            statusCode: {
                200: function(){
                    alert('Exercício guardado com sucesso');
                },
                500: function(response){
                    console.log(response.msg);
                }
            }
    });
}