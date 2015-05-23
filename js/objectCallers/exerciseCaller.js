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

// function to get the Options of a particular exercise
function getOptions() {
    $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Exercise',
                function: 'getOptions',
                idExercise: '1'        //NOT FINISHED!!!!!!!!!!!!!!!!
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    var select = $("#testOrder ul");
                    $.each(jsonData, function (index, o) {
                        var newOption = $('<li value="' + o.idOption + '"><p class="dragdiv">' + o.description+'</p></li>');
                        makeElementAsDragAndDrop(newOption);
                        select.append(newOption);
                    });
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
}

//when clicking on submit Exercise, save the outcome NOT FINISHED!!!!!!!!
$(document).ready(function () {
    $("#orderExerciseSubmit").click(function () {
        var jsonData;
        var j = 1;
        var count = 0;
      for(var i = -3; i < i-i; i++){
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            async: false,
            data: {
                object: 'Exercise',
                function: 'getCorrectOption',
                idExercise: '1',              //NOT FINISHED!!!!!!!!!!
                idOption: $('li').eq(i).val()
            },
            statusCode: {
                200: function(response){
                    jsonData = response;
                    if(j == jsonData.correctOption){
                         count++;
                     }
                 
                  j++;
                }
            }
          });
          }  
         alert(count);
     });
 });


