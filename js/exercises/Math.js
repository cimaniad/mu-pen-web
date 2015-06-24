// Global variables
var time = getUrlParameter("time");
var timer; // reference to timer
var currentQuestion; // store current question
var numberLimit = getUrlParameter("limitNumber"); // initial number limit
var rights = 0;
var wrongs = 0;
var member = 0;
var first = 1;


$(document).ready(function() {

  // Function to generate random numbers
  function getRand(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
  }
  // short hand for generating random numbers

  function chooseFormula() {
    var formulaArray = ["addition", "subtraction"];

    // randomize index
    var index = getRand(0, formulaArray.length - 1);
    // console.log(formulaArray[index]);
    return formulaArray[index];
  }

  var generateQuestion = function() {

    var formula;

    function generateQuestionText(a, b, operator) {
      return getRand(a, b) + operator + getRand(a, b);
    }



    function getQuestion(member, question, operator, result, members) {
      if (member === 1) {
        return "_" + operator + members[1] + " = " + result;
      } else if (member === 2) {
        return members[0] + operator + "_" + " = " + result;
      } else if (member === 3) {
        return members[0] + operator + members[1] + " = " + "_";
      }

    }

    function rigthMember(member, result, members) {
      if (member === 1) {
        return members[0];
      } else if (member === 2) {
        return members[1];
      } else if (member === 3) {
        return result;
      }
    }


    switch (chooseFormula()) {
      case 'addition':
        formula = function additionQuestion(a, b) {
          var question = generateQuestionText(a, b, ' + ') + "";
          var members = question.split(" + ");
          var result = parseInt(members[0]) + parseInt(members[1]);
          var randMember = getRand(1, 3);
          question = getQuestion(randMember, question, ' + ', result, members);
          result = rigthMember(randMember, result, members);
          return {
            'information': question,
            'result': result
          };
        };
        break;
      case 'subtraction':
        formula = function subtractionQuestion(a, b) {
          var question = generateQuestionText(a, b, ' - ') + "";
          var members = question.split(" - ");
          var result = parseInt(members[0]) - parseInt(members[1]);
          var randMember = getRand(1, 3);
          question = getQuestion(randMember, question, ' - ', result, members);
          result = rigthMember(randMember, result, members);
          return {
            'information': question,
            'result': result
          };
        };
        break;

    }

    return formula(1, numberLimit);
  };

  // create new question
  function makeNewQuestion() {
    var question = generateQuestion();
    $('#question p').text(question.information);
    return question;
  }

  // Initialize with a question
  currentQuestion = makeNewQuestion();

  // Resetting the timer with new time every 1 second
  var resetTimer = function() {
    timer = setInterval(function() {
      // Decrement every second
      time = Number(time) - 1;

      $('#time').text(time + " segundos para o final");

      // Check if game is over
      if (time === 0) {
        saveResultMath();
        clearInterval(timer);
        $("#question").hide();
        $("#score").show();
        $("#wrights").text("Acertou " + rights);
        $("#wrongs").text("Errou " + wrongs);


      }

    }, 1000);
  };


  // Listen to answers
  $('#answer').keyup(function(e) {
    //  $('#question').text($('#question').html() + String.fromCharCode(e.which));

    if (e.which == 13) {
      // check if answer is correct
      var result = currentQuestion.result;

      if (Number($('#answer').val()) === Number(result)) {

        // Create new question
        currentQuestion = makeNewQuestion();
        $('#answer').val('');
        // Increment wrights score
        rights++;
        if (first === 1) {
          // Restart timer
          resetTimer();
          first++;
        }

      } else {
        // Create new question
        currentQuestion = makeNewQuestion();
        $('#answer').val('');
        // Increment wrights score
        wrongs++;
      }
    }

  });

});

function saveResultMath(){
        $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "Post",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Answer',
                function: 'saveResult',
                idPatient: $('#idpatientExercises').val(),
                idExercise: getUrlParameter('gameChoosen'),
                resolutionTime: getUrlParameter('time'),
                attempts: rights + wrongs,
                wrongHits: wrongs,
                rightHits: rights,
                correctAnswer: '0',
                idSession: getUrlParameter('id'),
                numQuadrados: '0'
            },
            statusCode: {
                201: function (response) {
                    jsonData = response;
                    var select = $('#dialogChange');
                    var input = $('<input type="hidden" id="commentAnswerId" value="' + jsonData.idAnswer + '"/>');
                    select.append(input);
                    alert('Resultados Gravados');
                    $('#dialog-form').dialog('open');
                }
            }
        });
    });
}