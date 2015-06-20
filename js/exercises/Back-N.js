var game = {
  imagesArray: [
    "../imagens/Symbols/wrong.png",
    "../imagens/Symbols/right.png",
    "../imagens/animais/cao.png",
    "../imagens/animais/elefante.png",
    "../imagens/animais/galinha.png",
    "../imagens/animais/galinhaBranca.png"
  ],
  time: getUrlParameter("time"),
  succededHits: 0,
  failedHits: 0,
  currentImage: "", // image on the screen
  lastImage: "", //last image on the screen
  playing: false, // if the game is running or not
  gameTime: setInterval(function() {game.setTime();}, 1000),

  play: function() {
    //load first Image
    this.loadFirstImage();
    //passa objeto game para a variavel that
    var that = this;

    //listens for right or left arrows key press
    $(document).keydown(function(e) {
      if (that.playing && that.time !== 0) {
        switch (e.which) {

          case 37: // left arrow
            //check if the user should hit left arrow key
            that.playing=false;
            that.checkLeft();
            break;

          case 39: // right arrow
            //check if the user should hit right arrow key
            that.playing=false;
            that.checkRight();
            break;

          default:
            return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
      }
    });

    //the game time is 30 seconds

  },

  checkLeft: function() {
    if (this.currentImage === this.lastImage) { //checks if the image on the screen is equal to the previous
      this.hitFail();
    } else {
      this.hitSuccess();
    }
    this.playing=true;
  },

  checkRight: function() {
    if (this.currentImage === this.lastImage) { //checks if the image on the screen is equal to the previous
      this.hitSuccess();
    } else {
      this.hitFail();
    }
    this.playing = true;
  },


  hitSuccess: function() {
    var that = this;
    this.loadSuccessImage();
    this.succededHits++;
    //load next image after showing the success image for 0,4 seconds
    setTimeout(function() {
      that.loadImage();
    }, 400);
  },

  hitFail: function() {
    var that = this;
    this.loadErrorImage();
    this.failedHits++;
    //load next image after showing the error image for 0,4 seconds
    setTimeout(function() {
      that.loadImage();
    }, 400);
  },

  loadErrorImage: function() {
    $("#img").attr("src", this.imagesArray[0]);
  },

  loadSuccessImage: function() {
    $("#img").attr("src", this.imagesArray[1]);
  },

  loadFirstImage: function() {
    var that = this;
    this.currentImage = this.chooseRandImage();
    $("#img").attr("src", this.currentImage);
    // change the first image after 0,8 seconds
    setTimeout(function() {
      that.loadImage();
    }, 800);
  },

  loadImage: function() {
    this.lastImage = this.currentImage;
    this.currentImage = this.chooseRandImage();
    $("#img").attr("src", this.currentImage);
  },

  chooseRandImage: function() {
    var rand = Math.floor((Math.random() * 3) + 2);
    return this.imagesArray[rand];
  },

  gameOver: function() {
    $("#panel").hide();
    this.playing = false;
    this.setScore();
  },

  setScore: function() {
    $("#score").show();
    $("#succededHits").text("Número de acertos: " + this.succededHits);
    $("#failedHits").text("Número de erros: " + this.failedHits);
  },

  setTime: function() {
    --this.time;
    if (this.time === 0) {
      clearInterval(this.gameTime);
      $("#gameTime2").html(0 + " segundos");
      this.playing = false;
      saveResultBack();
	  this.gameOver();
    } else {
      $("#gameTime2").html(this.time + " segundos");
    }
  }
};

$(document).ready(function() {
  $("#score").hide();
  game.playing = true;
  game.play();

});

function saveResultBack(){
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
                attempts: game.succededHits + game.failedHits,
                wrongHits: game.succededHits,
                rightHits: game.failedHits,
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
