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

