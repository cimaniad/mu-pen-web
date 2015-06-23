  $(function () {
//function comment(){
    var dialog, form,
 
//      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      comment = $('#commentText'),
      allFields = $( [] ).add( comment ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Tamanho do " + n + " deve estar entre " +
          min + " e " + max + "." );
        return false;
      } else {
        return true;
      }
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }
 
    function addComment() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
      valid = valid && checkLength( comment, "comentário", 2, 250 );
 
      valid = valid && checkRegexp( comment, /^[a-z]([0-9a-z_\s])+$/i, "Comentário deve conter de a-z, 0-9, underscores, espaços e precisa de começar com uma letra" );
 
      if ( valid ) {
          var jsonData;
          $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            async: false,
            data: {
              object: 'Comment',
              function: 'saveComment',
              idAnswer: $('#commentAnswerId').val(),
              comment: $('#commentText').val()
            },
            statusCode: {
                201: function(response){
                    jsonData = response;
                    alert('Comentário adicionado com sucesso');
                    var idPatient = $('#idPatientComment').val(); 
                    var hp = $('#hpPatientComment').val();
                    var name = $('#idPatientName').val();
                    var lastName = $('#idPatientLastName').val();
                    addNotificationComment(jsonData.idComment,idPatient, hp, name, lastName);
                },
                500: function(){
                    alert('Erro a adicionar o comentário');
                }
            }
          });
          dialog.dialog("close");
      }
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        Continuar: function() {
          dialog.dialog( "close" );
          window.location.href = "../Patient/sessions.php";
        },
        "Comentar": addComment

      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addComment();
    });
 
//    $( "#orderExerciseSubmit" ).button().on( "click", function() {
//      dialog.dialog( "open" );
//    });
  });



