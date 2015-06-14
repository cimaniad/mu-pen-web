function addDirectory() {
    $(document).ready(function () {
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
                201: function () {
                    alert('Diretoria adicionada com sucesso');
                },
                500: function () {
                    alert('Erro a criar a Diretoria');
                },
                501: function () {
                    alert('Nome de Diretoria já existe');
                }
            }
        });
    });
}

function getDirectory() {
    $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Multimedia',
                function: 'getDirectory'
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    var $select = $("#allDirectory");
                    $.each(jsonData, function (index, o) {
                        $select.append('<option value="' + o.idDirectory + '">' + o.name + '</option>');
                    });
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
}

$(document).ready(function () {
    $("#allDirectory").change(function () {
        $("#MultimediaByDirectory").ddslick('destroy');
        $("#MultimediaByDirectory").empty();
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Multimedia',
                function: 'getMultimediaById',
                idDirectory: $('#allDirectory').val()
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    var $select = $("#MultimediaByDirectory");
                    $.each(jsonData, function (index, o) {
                        $select.append('<option value="' + o.idMultimedia + '" data-imagesrc="' + o.url + '">' + o.name + '</option>');
                    });
                    $('#damn').ddslick({
                        width: 200,
                        onSelected: function (data) {
                        }
                    });
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
});

function addMultimediaToExercise() {
    if ($('.dd-selected-value').val() !== 0) {
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Multimedia',
                function: 'addMultimediaToExercise',
                idExercise: getUrlParameter('idEx'),
                idMultimedia: $('.dd-selected-value').val()
            },
            statusCode: {
                201: function () {
                },
                500: function (response) {
                    alert('Erro a atribuir Multimédia');
                    console.log(response.mgs);
                }
            }
        });
    }
}

function getMultimediaByExercise() {
    $(document).ready(function () {
        var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Multimedia',
                function: 'getMultimediaByExercise',
                idExercise: getUrlParameter('gameChoosen')
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    var select = $('#imageMultExercise');
                    var input = $('<img src="'+jsonData.url+'" alt="Imagem Indisponível" style: width=300em height=300em>');
                    select.append(input);
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
}