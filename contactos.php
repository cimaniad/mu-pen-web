<?php
include 'header.php';
?>

   <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
   <script type="text/javascript" src="./js/mapas.js"></script>
   <div id="content">
       <h1 class="help">Formulário de Contacto:</h1>
   <p>Se tiver alguma <strong>questão</strong>,<strong> comentário</strong> e/ou<strong> preocupação</strong> comunique connosco através dos seguintes meios:</p>
   <form action="#" method="post">
          <div class="form_settings">
           <div class="nome_cont">     <p><strong>Nome: </strong><input type="text" value="" placeholder="Nome..." required/></p> </div>
           <div class="email_cont">     <p><strong>Email: </strong><input type="text" value="" placeholder="Email..." required /></p> </div>
           <div class="assunto_cont">    <p><strong>Assunto: </strong><input type="text" value="" placeholder="Assunto..."/></p> </div>
           <label><strong>Mensagem: </strong><div class="mens_cont">    <textarea class="contact textarea" rows="8" cols="50" placeholder="Escreva aqui a sua mensagem..." required></textarea> </label></div>
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" type="submit" value="Enviar" /></p> 
          </div>
        </form>
       <h1 class="help">Localização:</h1>
   <div id="content_header"></div>
            <div id="site_content">
                <div id="banner" align="left">
 
        <div id="map-canvas"></div>  
  </div>
</div>
 </div>
   
</div>
</div>
        

    <?php
include 'footer.php';
?>