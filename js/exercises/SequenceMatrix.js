/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 var numColunas = getUrlParameter("col");
 var numLinhas = getUrlParameter("col");
 var time = getUrlParameter("time");
 var appearTime = getUrlParameter("appearTime")*1000;
 var lado = 45;
 var jogar = false;
 var numMaxQuadrados = 0;
 var gameTime = 0;

$(document).ready(function() {

  desenhar(numColunas, numLinhas);
  gameTime = setInterval(decrementarSegundos, 1000);
});

/*
 * esta função recebe como parametros o numero de linhas e de colunas da matriz e desenha a em
 * função desses parametros, invocando a função criarQuadrados().
 * Apresenta
 */

function desenhar(numColunas, numLinhas) {
  $(".quadro").fadeOut(1000, function() {

    $(".quadro").empty(); //limpa o quadro para o proximo jogo
    $("#janela").animate({
      height: ((lado + 11) * numLinhas) + "px",
      width: ((lado + 8) * numColunas) + "px"
    }, 1000, function() { //faz a janla crescer conforme o jogo vai evoluindo

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

    if (jogar && time !==0) {
      $(this).attr("clicado", "clicado");
      var numSelecionados = $("div[clicado='clicado']").length;
      var nCorretos = parseInt((numColunas * numLinhas) / 3);

      if ($(this).attr("escolhido") === "escolhido" && $(this).attr("num") == numSelecionados - 1) {
        $(this).addClass("escolhido");
      } else {
        $(this).addClass("errado");
        $(".quadrado[escolhido='escolhido']:not(.escolhido)").addClass("escolhido"); //mostra as posiçoes corretas se o paciente se enganar
        if (nCorretos!==1) {
          if (numColunas === numLinhas) {
            --numLinhas;
          } else {
            --numColunas;
          }
        }
        desenhar(numColunas, numLinhas);
      }
      if (numSelecionados === nCorretos && $(".errado").length === 0) {
        jogar = false;
          if (numMaxQuadrados < nCorretos) {
            numMaxQuadrados = nCorretos;
            $("#nMaxQuadrados").text("Maior número de quadrados acertados : " + numMaxQuadrados);
          }
          if (numColunas === numLinhas) {
            ++numColunas;
          } else {
            ++numLinhas;
          }
        desenhar(numColunas, numLinhas);
      }
    }
  });
}

var contador = 0;
var numAleatorio = 0;

function sortearQuadrados() {
  var numQuadrados = $(".quadrado").length;
  $(".quadrado").removeClass("escolhido");

  if (contador < parseInt(numQuadrados / 3)) {
    do {
      numAleatorio = parseInt(Math.random() * numQuadrados);
    } while ($(".quadrado").eq(numAleatorio).attr("escolhido") === "escolhido");
    $(".quadrado").eq(numAleatorio).addClass("escolhido").attr("escolhido", "escolhido").attr("num", contador);
    contador++;
    setTimeout(sortearQuadrados, appearTime);
  } else {
    jogar = true;
    contador = 0;
    numAleatorio = 0;
  }
}

function decrementarSegundos() {
    --time;
    if(time === 0){
      clearInterval(gameTime);
      $("#tempoJogo").html(0 + " segundos");
      jogar = false;
    }else{
      $("#tempoJogo").html(time + " segundos");
    }

}
