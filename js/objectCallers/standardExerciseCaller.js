
function getStructures(){
     $(document).ready(function(){
       var jsonData;
       $.ajax({
                 type: "POST",
                 url: "http://localhost/nep-um-web/api/",
                 dataType: 'json',
                 data: {
                 object: 'StandardExercise',
                 function: 'getStandardExercises'
                 },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        var $select = $("#structureCreateExercise");
                           $.each(jsonData, function (index, o) {    
                           $select.append('<option value="' + o.idStandardExercise + '">' + o.name + '</option>');
                       });
                        },
                        404: function(){
                            console.error('BD Error');
                        }
                    }
       }); 
    });
}

//function to get the exercises by standard exercise, when we change the standard exercise
$(document).ready(function(){
    $("#structureCreateExercise").change(function () {
        var jsonData;
        $.ajax(
                {
                    type:"Post",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: { 
                    object:'StandardExercise',
                    function: 'getExerciseByStandardExercise',
                    idStandardExercise: $('#structureCreateExercise').val()
                    },
                    statusCode: {
                        200: function(response){
                        jsonData = response;
                        var select = $("#exerciseByStandard");
                        select.empty();
                           $.each(jsonData, function(index, o){
                           select.append('<option value="'+o.idExercise+'">'+o.name+'</option>');
                           });
                             },
                        404: function(){
                            var select = $('#exerciseByStandard');
                            select.empty();
                            console.log("No exercises with that structure");
                        }
                    }
                
        });
     });   
});