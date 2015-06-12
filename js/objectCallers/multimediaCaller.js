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
                    $('#MultimediaByDirectory').ddslick({
                        onSelected: function (selectedData) {
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
