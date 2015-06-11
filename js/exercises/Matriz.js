/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var numColunas = getUrlParameter("col");
var numLinhas = getUrlParameter("col");
var lado = 75;
var jogar = false;
var numMaxQuadrados = 0;

$(document).ready(function() {

    desenhar(numColunas, numLinhas);

});

/*
 * esta função recebe como parametros o numero de linhas e de colunas da matriz e desenha a em 
 * função desses parametros, invocando a função criarQuadrados().
 * Apresenta 
 */

function desenhar(numColunas, numLinhas) {
    $(".quadro").fadeOut(1000, function() {

        $(".quadro").empty();   //limpa o quadro para o proximo jogo

        $("#janela").animate({height: ((lado + 10) * numLinhas)
                    + "px", width: ((lado + 8) * numColunas) + "px"}, 1000, function() {//faz a janla crescer conforme o jogo vai evoluindo

            for (var i = 0; i < (numColunas * numLinhas); i++) {
                $(".quadro").append(criarQuadrados(lado));
            }

            $(".quadro").fadeIn(300);
            sortearQuadrados();

        });

    }); //acaba o fadeOut
}

/*
 * esta função retorna uma div com a class quadrado e a esse quadrado vem associado um evento de click
 */

function criarQuadrados(lado) {
    return $("<div>").addClass("quadrado").height(lado + "px").width(lado + "px").click(function() {

        if (jogar) {
            if ($(this).attr("escolhido") === "escolhido") {
                $(this).addClass("escolhido");
                $(this).attr("clicado", "clicado");
            } else {
                $(this).addClass("errado");
                $(this).attr("clicado", "clicado");
            }

            var numSelecionados = $("div[clicado='clicado']").length;
            var nCorretos = Math.floor((numColunas * numLinhas) / 3);

            if (numSelecionados === nCorretos) {
                jogar = false;
                $(".quadrado[escolhido='escolhido']:not(.escolhido)").addClass("escolhido");    //mostra as posiçoes corretas se o paciente se enganar

                if ($(".errado").length === 0) {
                    if (numMaxQuadrados < nCorretos) {
                        numMaxQuadrados = nCorretos;
                        $("#nMaxQuadrados").text("Maior número de quadrados acertados : " + numMaxQuadrados);
                    }
                    if (numColunas === numLinhas) {
                        ++numColunas;
                    } else {
                        ++numLinhas;
                    }

                } else if ($(".errado").length >= 2) {


                    if (numColunas === numLinhas) {
                        --numLinhas;
                    } else {
                        --numColunas;
                    }
                }
                desenhar(numColunas, numLinhas);
            }
        }
    });
}



function sortearQuadrados() {

    var contador;
    var numQuadrados = $(".quadrado").length;

    for (contador = 0; contador < Math.floor(numQuadrados / 3); ) {
        var numAleatorio = Math.floor(Math.random() * numQuadrados);
        if (!$(".quadrado").eq(numAleatorio).hasClass("escolhido")) {
            $(".quadrado").eq(numAleatorio).addClass("escolhido").attr("escolhido", "escolhido");
            contador++;
        }

    }
    setTimeout(esconder, 1200);
}

function esconder() {
    $(".quadrado").removeClass("escolhido");
    jogar = true;
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