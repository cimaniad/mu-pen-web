/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var clicks = 0;
var paresEncontrados = 0;
var cartaVirada = "";
var imagemVirada = "";
var segundos = 0;
var tamanho = getUrlParameter('numMatriz');
var tempoInicial = getUrlParameter('appearTime') * 1000;
var rightHits = 0;
var wrongHits = 0;


var imagensAnimais = [
    "../imagens/animais/cao.png",
    "../imagens/animais/elefante.png",
    "../imagens/animais/galinha.png",
    "../imagens/animais/galinhaBranca.png",
    "../imagens/animais/leao.png",
    "../imagens/animais/mocho.png",
    "../imagens/animais/pantera.png",
    "../imagens/animais/pingu.png",
    "../imagens/animais/tigre.png",
    "../imagens/animais/zebra.png"
];


$(document).ready(function () {
    while (imagensAnimais.length > tamanho) {
        imagensAnimais.pop();
    }
    if (tamanho == 3) {
        $("#janela").css("width", "325px");
        $("#janela").css("height", "210px");
    } else if (tamanho == 6) {
        $("#janela").css("width", "400px");
        $("#janela").css("height", "310px");
    }
    desenhar(imagensAnimais);
});

/**
 * metodo para misturar elementos de um array
 * 
 * @returns {Array.prototype.misturarArray|Array.prototype.misturarArray.input}
 */
Array.prototype.misturarArray = function () {
    var input = this;
    for (var i = input.length - 1; i > 0; i--) {
        var randomIndex = Math.floor(Math.random() * (i + 1));
        var itemAtIndex = input[randomIndex];
        input[randomIndex] = input[i];
        input[i] = itemAtIndex;
    }
    return input;
}


function desenhar(arr) {


    for (var x = 0; x < 2; x++) {

        arr.misturarArray();
        $.each(arr, function (i, val) {
            if (i + 1 <= tamanho) {
                $("#quadro").append("<div id=card" + x + i + "><img src=" + val + " />");
            }
        });
    }

    $("#quadro div img").fadeIn(500);
    setTimeout(function () {
        $("#quadro div img").fadeOut(1000);
    }, tempoInicial);


    $("#quadro div").click(abrirCarta);


}


function abrirCarta() {

    if (clicks === 0) {
        tempoJogo = setInterval(incrementarSegundos, 1000);
    }
    var id = $(this).attr("id");


    if ($(this).children().is(":hidden")) {

        ++clicks;
        $("#clicks").html(clicks + " clicks");

        $($(this).children()).fadeIn('fast');
        $("#quadro div").unbind("click", abrirCarta);

        if (imagemVirada === "") {

            cartaVirada = id;
            imagemVirada = $(this).children().attr("src");
            setTimeout(function () {
                $("#quadro div").bind("click", abrirCarta);

            }, 300);
        } else {

            var imagemAtual = $(this).children().attr("src");

            if (imagemAtual !== imagemVirada) {
                wrongHits++;
                setTimeout(function () {

                    $("#" + id + " img").fadeOut("fast");
                    $("#" + cartaVirada + " img").fadeOut("fast");
                    imagemVirada = "";
                    cartaVirada = "";
                }, 500);



            } else {
                rightHits++;
                ++paresEncontrados;
                imagemVirada = "";
                cartaVirada = "";


            }

            setTimeout(function () {
                $("#quadro div").bind("click", abrirCarta);

            }, 500);

        }
        if (tamanho == paresEncontrados) {
             saveResultPairs();
            clearInterval(tempoJogo);

//            $("#fimJogo").html("Fim do jogo, os seus resultados são:");
        }

    }

}
function incrementarSegundos() {
    ++segundos;
    $("#tempoJogo").html(segundos + " segundos");
}

function saveResultPairs() {
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
                resolutionTime: segundos,
                attempts: rightHits + wrongHits,
                wrongHits: wrongHits,
                rightHits: rightHits,
                correctAnswer: '0'
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
 