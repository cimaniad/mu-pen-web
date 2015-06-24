// function to get the Options of a particular exercise
function getOptions() {
    $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Option',
                function: 'getOptionsbyExercise',
                idExercise: getUrlParameter('gameChoosen')
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    if (getUrlParameter('structure') == 4) { //get options for sequence exercises
                        var select = $("#testOrder ul");
                        var options = [];
                        $.each(jsonData, function (index, o) {
                            var newOption = $('<li value="' + o.idOption + '"><p class="dragdiv">' + o.description + '</p></li>');
                            options.push(newOption);
                        });
                        shuffleArray(options);
                        for (var i = 0; i < options.length; i++) {
                            makeElementAsDragAndDrop(options[i]);
                            select.append([options[i]]);
                        }

                    } else if (getUrlParameter('structure') == 5) { //get options for multiple choice exercises
                        var select = $('.estrutura_em');
                        var options = [];
                        $.each(jsonData, function (index, o) {
                            if ($('#correctOptionsNumber').val() == 1) { //if there´s only one correct Option insert a radio button
                                var newOption = $('<div id="optionsMulti"><input type="radio" value="' + o.idOption + '" name="choose"/><label>' + o.description + '</label></div></br></br>');
                            
                            } else {                             //else insert a checkbox
                                var newOption = $('<input type="checkbox" value="' + o.idOption + '" /><label>' + o.description + '</label></br></br>');
                            }
                            options.push(newOption);        
                     });
                            shuffleArray(options);
                            for(var i=0; i<options.length; i++)
                            select.append(options[i]);

                        $('input').iCheck({
                            checkboxClass: 'icheckbox_flat-orange',
                            radioClass: 'iradio_flat-orange',
                            increaseArea: '50%' // optional
                        });

                    }
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
}

//when clicking in Enviar Resposta on a order exercise
$(document).ready(function () {
    $("#orderExerciseSubmit").click(function () {
        if (getUrlParameter('structure') == 4) { // if it´s a sequence exercise
            var options = $('#optionsNumber').val();
            var jsonData;
            var j = 0;
            var list = [];
            var count = 0;
            for (var i = -options; i < 0; i++) {  //cicle to get each position the user inserts the sequence
                $.ajax({
                    type: "POST",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    async: false,
                    data: {
                        object: 'Option',
                        function: 'correctOrderExercise',
                        idExercise: getUrlParameter('gameChoosen')
                    },
                    statusCode: {
                        200: function (response) {
                            jsonData = response;
                            list.push($('li').eq(i).val());  //add value of each position to an array
                            if (jsonData[j] == list[j]) {  //checks if the position the user put the <li> is right
                                count++;
                            }
                            j++;
                        }
                    }
                });
            }
            if (count == options) {          //if the user gets every position right, save the result has a right answer 
                saveResult(1);
            } else {                        //else save the result has a wrong answer
                saveResult(0);
            }
              clearInterval(tempoJogo);
        } else if (getUrlParameter('structure') == 5) { //if we have a multiple choice structure
            getOptionById();            //function to get the results of m.c. structure
        } else if (getUrlParameter('structure') == 6) {

        }

    });

});

function getOptionById() {
    var jsonData;
    if ($('#correctOptionsNumber').val() == 1) { //if there´s only one right option
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Option',
                function: 'getOptionById',
                idOption: $('#optionsMulti input[name=choose]:checked').val()
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    if (jsonData.correctOpt == 1) {  //checks if the choice is right, if so then send a right answer to DB 
                        
                        saveResult(1);
                    } else {                 //else send a wrong answer to the DB
                        saveResult(0);
                    }
                    clearInterval(tempoJogo);
                }
            }
        });
    } else {                           //if more than one right choice
        var count = 0;
        var checks = $('.estrutura_em input:checkbox:checked').length;
        if (checks == $('#correctOptionsNumber').val()) {   //checks if the user selected the right amount of right choices

            $(".estrutura_em input:checkbox:checked").each(function () { //gets each choice given by the user
                $.ajax({
                    type: "POST",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    async: false,
                    data: {
                        object: 'Exercise',
                        function: 'getOptionById',
                        idOption: $(this).val()
                    },
                    statusCode: {
                        200: function (response) {
                            jsonData = response;
                            if (jsonData.correctOpt == 1) {   //checks if the user got each answer right   
                                count++;
                            }
                        }
                    }
                });
            });
            if (count == checks) {
                saveResult(1);            //if he got all answers right save the result as a right answer
            } else {                  //else save the result has a wrong answer
                saveResult(0);
            }
        } else {
            saveResult(0);                 //if the user didn´t get the right amount of right answers, return a wrong answer to the DB
        }

    }
}

function getConfigs() { //get matriz size and appear time for pairs exercise
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
            200: function (response) {
                jsonData = response;
                var select = $('#questionResolve');
                var input = $('<p>' + jsonData.question + '</p>');
                select.append(input);
                if (getUrlParameter('structure') == 6) {
                    window.location.replace("exercisesPage.php?id="+getUrlParameter('id')+"&structure=" + getUrlParameter('structure') + "&gameChoosen=" + getUrlParameter('gameChoosen') +
                            "&numMatriz=" + jsonData.numMatriz + "&appearTime=" + jsonData.appearTime + '#');
                } else if ((getUrlParameter('structure')) == 3 || (getUrlParameter('structure')) == 7) {
                    window.location.replace("exercisesPage.php?id="+getUrlParameter('id')+"&structure=" + getUrlParameter('structure') + "&gameChoosen=" + getUrlParameter('gameChoosen') +
                            "&col=" + jsonData.numMatriz + '&appearTime=' + jsonData.appearTime + '&time=' + jsonData.time + '#');
                } else if (getUrlParameter('structure') == 2) {
                    window.location.replace("exercisesPage.php?id="+getUrlParameter('id')+"&structure=" + getUrlParameter('structure') + "&gameChoosen=" + getUrlParameter('gameChoosen') +
                            "&time=" + jsonData.time + '#');
                    
                }else if(getUrlParameter('structure') == 1){
                    window.location.replace("exercisesPage.php?id="+getUrlParameter('id')+"&structure="+getUrlParameter('structure')+'&gameChoosen='+getUrlParameter('gameChoosen')+
                            '&time='+jsonData.time+'&limitNumber='+jsonData.numMatriz+'#');    
             $(document).ready(function() {
            $.getScript("../js/exercises/Math.js");
            });
                }
            }
        }
    });
}