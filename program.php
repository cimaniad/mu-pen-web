<?php
include 'header.php';
 
if(!isset($_GET['id'])){
     header("Location: index.php");
}else{
 if($_GET['id'] == 'quem'){
?>
<h1 style="color: #A30000;"><strong> O que é? </strong></h1>
        <p>O NEP-UM é uma <strong> plataforma de treino cognitivo </strong> desenvolvida no âmbito do Projecto com o título <strong> “Treino Cognitivo em Perturbações cerebrais: Eficácia da estimulação cognitiva e desenvolvimento de uma nova ferramenta para os clínicos Portugueses”</strong>, financiado pela Ciência e Tecnologia (Referência PIC/IC/83290/2007), e é destinada a profissionais e pacientes envolvidos no processo de reabilitação cognitiva.</p>
        <p>Esta ferramenta foi desenvolvida tendo por base as mais recentes evidências respeitantes a conhecimentos teóricos e técnicas de terapias cognitivas aplicadas no contexto de diversas patologias neurológicas e psiquiátricas (exemplo - Doença de Alzheimer, Esclerose Múltipla, AVC, Traumatismo Crânioencefálico, Síndrome de Williams, etc.).</p>
        <p>A plataforma NEP-UM permite:</p>
        <ol>
            <li>Prescrever, por parte do terapeuta, sessões e exercícios específicos para o paciente/participante.</li>
            <li>Monitorizar o desempenho ao longo das tarefas bem como a elaboração de relatório para o terapeuta assistente.</li>
            <li>Aceder a exercícios especificamente adaptados às necessidades específicas do paciente/participante.</li>
        </ol>
<?php 
}else {
    if($_GET['id']== 'missao'){ ?>
        
         <h1 style="color: #A30000;"><strong> Missão & Visão </strong></h1>
        <p>Os défices cognitivos estão associados a uma grande variedade de perturbações, tendo um impacto significativo no funcionamento ocupacional e social dos pacientes.</p>
        <p>Neste sentido, as terapias de estimulação cognitiva são de extrema importância no que respeita ao tratamento destes défices, intervindo nas alterações neuropsicológicas e funcionais do paciente, promovendo e aumentando simultaneamente a qualidade de vida dos pacientes e dos seus cuidadores. No entanto, em Portugal, não existem programas de estimulação cognitiva disponíveis para os clínicos implementarem de forma ecológica e sistemática na sua prática profissional, o que salienta a relevância deste projecto.</p>        
        <p><strong>Assim, o objectivo principal deste projecto é: </strong></p>
        <ul>
            <li> Desenvolver um programa de estimulação pioneiro e acessível aos clínicos, direccionado para ser adaptado às necessidades específicas dos pacientes com défices neuropsicológicos.</li>
            <li> Adicionalmente, o desenvolvimento deste programa oferece aos clínicos que trabalham em contextos clínicos e terapêuticos uma ferramenta de trabalho com um campo de aplicação vasto, podendo ser generalizado para a estimulação cognitiva de pacientes com perturbações do neurodesenvolvimento, neurodegenerativas, autoimunes, neuropsiquiátricas e dano cerebral traumático.</li>
        </ul>
        <p>Assim, a missão do <strong>NEP-UM é: </strong></p>
        <ul>
            <li> Tornar facilmente disponível o acesso a programas de intervenção neuropsicológicos validados.</li>
        </ul>
        <?php
    }
}
}
?>
 
   
  </div>
</div>
<?php
include 'footer.php';
?>