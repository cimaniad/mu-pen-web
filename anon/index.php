<?php
include 'header.php';
?>
<script type="text/javascript">
$(document).ready(function() {
    //Show the paging and activate its first link
    $(".paging").show();
    $(".paging a:first").addClass("active");
    
    //Get size of the image, how many images there are, then determin the size of the image reel.
    var imageWidth = $(".slider").width();
    var imageSum = $(".image_reel img").size();
    var imageReelWidth = imageWidth * imageSum;
    
    //Adjust the image reel to its new size
    $(".image_reel").css({'width' : imageReelWidth});
    
    //Paging  and Slider Function
    rotate = function(){
        var triggerID = $active.attr("rel") - 1; //Get number of times to slide
        var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide
    
        $(".paging a").removeClass('active'); //Remove all active class
        $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)
    
        //Slider Animation
        $(".image_reel").animate({
            left: -image_reelPosition
        }, 500 );
    
    }; 
    
    //Rotation  and Timing Event
    rotateSwitch = function(){
        play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
            $active = $('.paging a.active').next(); //Move to the next paging
            if ( $active.length === 0) { //If paging reaches the end...
                $active = $('.paging a:first'); //go back to first
            }
            rotate(); //Trigger the paging and slider function
        }, 7000); //Timer speed in milliseconds (7 seconds)
    };
    
    rotateSwitch(); //Run function on launch 

    //On Hover
    $(".image_reel a").hover(function() {
        clearInterval(play); //Stop the rotation
    }, function() {
        rotateSwitch(); //Resume rotation timer
    });	
    
    //On Click
    $(".paging a").click(function() {
        $active = $(this); //Activate the clicked paging
        //Reset Timer
        clearInterval(play); //Stop the rotation
        rotate(); //Trigger rotation immediately
        rotateSwitch(); // Resume rotation timer
        return false; //Prevent browser jump to link anchor
    });       
});
</script>
        <div class="slider-container">
    <div class="slider">
        <div class="image_reel">
            <a href="../articles/consultarInfo.php"><img src="../imagens/exercicios.jpg" width="554" height="369" alt="1" /></a>
            <a href="../articles/download.php"><img src="../imagens/pdf.png" width="554" height="369" alt="2" /></a>            
            <a href="../articles/download1.php"><img src="../imagens/winrar.jpg" alt="3" width="554" height="369"/></a>
            <a href="../anon/contacts.php"><img src="../imagens/fale.png" alt="4" width="554" height="369"/></a>
        </div>
    </div>
    <div class="paging">
        <a href="#" rel="1">1</a>
        <a href="#" rel="2">2</a>
        <a href="#" rel="3">3</a>
        <a href="#" rel="4">4</a>
    </div>
</section>  
 
          
  </div>
</div>


