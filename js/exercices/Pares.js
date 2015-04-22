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
var tamanho = getUrlParameter('image_number');
var tempoInicial = getUrlParameter('initial_time')*1000;


var imagensAnimais = [
    "./imagens/animais/cao.png",
    "./imagens/animais/elefante.png",
    "./imagens/animais/galinha.png",
    "./imagens/animais/galinhaBranca.png",
    "./imagens/animais/leao.png",
    "./imagens/animais/mocho.png",
    "./imagens/animais/pantera.png",
    "./imagens/animais/pingu.png",
    "./imagens/animais/tigre.png",
    "./imagens/animais/zebra.png"
];


$(document).ready(function() {
    while (imagensAnimais.length > tamanho) {
        imagensAnimais.pop();
    }
    if (tamanho == 3) {
        $("#janela").css("width", "380px");
        $("#janela").css("height", "250px");
    } else if (tamanho == 6) {
        $("#janela").css("width", "504px");
        $("#janela").css("height", "375px");
    }
    desenhar(imagensAnimais);
});

/**
 * metodo para misturar elementos de um array
 * 
 * @returns {Array.prototype.misturarArray|Array.prototype.misturarArray.input}
 */
Array.prototype.misturarArray = function() {
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
        $.each(arr, function(i, val) {
            if (i + 1 <= tamanho) {
                $("#quadro").append("<div id=card" + x + i + "><img src=" + val + " />");
            }
        });
    }

    $("#quadro div img").fadeIn(500);
    setTimeout(function() {
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
            setTimeout(function() {
                $("#quadro div").bind("click", abrirCarta);

            }, 300);
        } else {

            var imagemAtual = $(this).children().attr("src");

            if (imagemAtual !== imagemVirada) {

                setTimeout(function() {

                    $("#" + id + " img").fadeOut("fast");
                    $("#" + cartaVirada + " img").fadeOut("fast");
                    imagemVirada = "";
                    cartaVirada = "";
                }, 500);



            } else {

                ++paresEncontrados;
                imagemVirada = "";
                cartaVirada = "";


            }

            setTimeout(function() {
                $("#quadro div").bind("click", abrirCarta);

            }, 500);

        }
        if (tamanho == paresEncontrados) {
            clearInterval(tempoJogo);
            $("#fimJogo").html("Fim do jogo, os seus resultados são:");
        }

    }



}

function incrementarSegundos() {
    ++segundos;
    $("#tempoJogo").html(segundos + " segundos");
}

function getUrlParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}  