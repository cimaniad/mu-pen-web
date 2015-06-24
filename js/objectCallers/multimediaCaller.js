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
                    window.location.href = 'addMultimedia.php';                    
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
       
       $("#damn").ddslick('destroy');
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

$(document).ready(function () {
    $('#allDirectory').change(function () {
        var select = $('#directory');
        var input = $('<input type="hidden" id="nameDirectory12" name="nameDirectory" value="' + $('#allDirectory :selected').text() + '">');
        select.append(input);
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
                    var input = $('<img src="' + jsonData.url + '" alt="Imagem Indisponível" style: width=300em height=300em>');
                    select.append(input);
                    
                    window.location.href = "";
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
}

function addMultimedia() {
    $(document).ready(function () {
        if (($('#name_multimedia').val() === '')) {
            alert('Preencha o campo Nome');
        } else {
            $.ajax(
                    {
                        type: "POST",
                        url: "http://localhost/nep-um-web/api/",
                        dataType: 'json',
                        data: {
                            object: 'Multimedia',
                            function: 'addMultimedia',
                            name: $('#name_multimedia').val(),
                            url: 'http://localhost/nep-um-web/api/images/ExercisesMultimedia/' + $('#nameDirectory').val() + '/' + $('#addMultimediaDirectory').val(),
                            idDirectory: $('#allDirectory').val()
                        },
                        statusCode: {
                            201: function () {
                                alert('Multimédia adicionada com sucesso');
                                window.location.href = 'addMultimedia.php';
                            },
                            500: function () {
                                alert('Erro ao adicionar Multimédia');
                            },
                            501: function () {
                                alert('Nome de Multimédia já existe');
                            }
                        }
                    });
        }
    });
}



function deleteDirectory() {
    $(document).ready(function () {
        $.ajax(
                {
                    type: "POST",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: {
                        object: 'Multimedia',
                        function: 'deleteDirectory',
                        idDirectory: $('#allDirectory').val()
                    },
                    statusCode: {
                        200: function () {
                            alert('Diretoria eliminada com sucesso');
                            window.location.href = 'deleteDirectory.php';
                        },
                        500: function () {
                            alert('Erro: Diretoria tem imagens associadas');
                        }
                    }
                });
    });
}

function deleteMultimedia(){
    $(document).ready(function () {
        if($('#imageID').val() !== 0){
        $.ajax(
                {
                    type: "POST",
                    url: "http://localhost/nep-um-web/api/",
                    dataType: 'json',
                    data: {
                        object: 'Multimedia',
                        function: 'deleteMultimedia',
                        idMultimedia: $('#imageID').val()
                    },
                    statusCode: {
                        200: function () {
                            alert('Multimedia eliminada com sucesso');
                            window.location.href = 'deleteMultimedia.php';
                        },
                        500: function () {
                            alert('Erro a eliminar multimédia');
                        }
                    }
                    
                });
        }
    });
    }
    
$(document).ready(function () {
    $("#dude").change(function () {
        $("#imageChoice").empty();
       var jsonData;
        $.ajax({
            type: "POST",
            url: "http://localhost/nep-um-web/api/",
            dataType: 'json',
            data: {
                object: 'Multimedia',
                function: 'getMultimediaById',
                idDirectory: $('#dude').val()
            },
            statusCode: {
                200: function (response) {
                    jsonData = response;
                    var $select = $("#imageChoice");
                    $select.append('<option>Escolher Imagem</option>');
                    $.each(jsonData, function (index, o) {
                    $select.append('<option value="' + o.idMultimedia + '">' + o.name + '</option>');
                    });
                },
                404: function () {
                    console.error('BD Error');
                }
            }
        });
    });
});

function getDirectory2() {
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
                    var $select = $("#dude");
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
    $('#imageChoice').change(function () {
        var select = $('#directory');
        var input = $('<input type="hidden" id="nameImage12" name="nameImage" value="' + $('#imageChoice :selected').text() + '">');
        select.append(input);
    });
});

$(document).ready(function () {
    $('#dude').change(function () {
        var select = $('#directory');
        var input = $('<input type="hidden" id="nameDirectory12" name="nameDirectory" value="' + $('#dude :selected').text() + '">');
        select.append(input);
    });
});