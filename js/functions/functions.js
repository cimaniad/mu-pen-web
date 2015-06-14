var segundos = 0;

function onlyLettersNumbers(id){
$(document).ready(function(){
    $(id).keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if((inputValue > 32 && inputValue < 45) || (inputValue > 59 && inputValue < 63) || (inputValue == 64)){
            event.preventDefault();
        }
    });
});
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

$(document).ready(function(){
   $('#cancelThings').click(function(){
      window.location.href = '../redirectUser.php'; 
   });
});

function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}