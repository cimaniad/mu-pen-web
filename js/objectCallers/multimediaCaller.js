function addDirectory(){
    $(document).ready(function(){
     $.ajax({
           type: "POST",
           url: "http://localhost/nep-um-web/api/",
           dataType: 'json',
           data: {
           object: 'Multimedia',
           function: 'addDirectory',
           name: $('#nameDirectory').val()
               },
             statusCode: {
                201: function(){
                  alert('Diretoria adicionada com sucesso');
                      },
                500: function(){
                  alert('Erro a criar a Diretoria');
                        },
                501: function(){
                  alert('Nome de Diretoria já existe');
                        }
                    }
        });
    });
 }
