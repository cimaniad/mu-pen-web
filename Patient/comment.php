
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src='../js/objectCallers/notificationCaller.js' type='text/javascript'></script>
<script src="../js/objectCallers/commentsCaller.js" type="text/javascript"></script>
<div id="dialogChange"></div>
<div id="dialog-form" title="Criar comentário">
  <p class="validateTips">Escreva um comentário em relação ao exercício(Opcional)</p>
  <input type="hidden" id="hpPatientComment" value="<?=$_SESSION['healthProfessional']?>">
  <input type="hidden" id="idPatientComment" value="<?=$_SESSION['idPatient']?>">
  <input type="hidden" id="idPatientName" value="<?=$_SESSION['name']?>">
  <input type="hidden" id="idPatientLastName" value="<?=$_SESSION['lastName']?>">  
  <form>
    <fieldset>
      <label for="name">Comentário</label>
      <textarea cols="20" rows="5" type="text" name="name" id="commentText" placeholder="Insira comentário" class="text ui-widget-content ui-corner-all"></textarea>
      <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
  </form>
</div>




