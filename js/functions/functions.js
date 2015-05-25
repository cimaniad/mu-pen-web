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
