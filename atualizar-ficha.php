
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/icon.png" />
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
    <title>Cliníca Odonto Unisagrado</title>
</head>

<body>
<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location: login.php');
}
$acao = 'ficha-user';

require 'back-end/AppController.php';

$checkAnos = explode(',', $p->dois_anos);
$checkEstado = explode(',', $p->estado_animico);
$checkConduta = explode(',', $p->conduta_psico);
$checkCondutaPatologia = explode(',', $p->patologia_conduta);
$checkSono = explode(',', $p->sono);

?>
<!--MENU  -->
<header id="header">
<a id="logo" href="home.php"><img width="200" src="assets/img/logo.png" alt="logo"></a>
			       
    <nav id="nav">
      <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
        <span id="hamburger"></span>
      </button>
      <ul id="menu" role="menu">
      <li>
      <a class="nav-link" href="home.php">Home</a>
					</li>
    
                    <li>  <a  href="back-end/AppController.php?acao=logout" align="right"> <?php echo "{$_SESSION['user']} | Sair" ?> </a></li>
      </ul>
    </nav>
  </header><br><br>
<!--FIM MENU-->

  <div id="main-containerFicha">
  <div id="msg-required" class="alert alert-danger" role="alert"></div>
  <?php 
      if(isset($_SESSION['msg-atualizar']) && $_SESSION['msg-atualizar'] == false){ ?>
         <div id="msg-erro" class="alert alert-danger" role="alert">
         Erro ao atualizar. Verifique os dados informados!
        </div>
          
      <?php
        unset($_SESSION['msg-atualizar']);
      }
         if(isset($_SESSION['msg-atualizar']) && $_SESSION['msg-atualizar'] == true){
          ?>
          <div id="msg-success" class="alert alert-success" role="alert">
            Dados atualizados com sucesso!
        </div>
        <?php 
           unset($_SESSION['msg-atualizar']);
         }
         if(isset($_SESSION['msg-excluir']) && $_SESSION['msg-excluir'] == false){
          ?>
          <div id="msg-erro" class="alert alert-danger" role="alert">
          Erro ao excluir avaliação!
        </div>
        <?php 
          unset($_SESSION['msg-excluir']);
        }

        ?>

  <br><Strong><h3 class="text-center"> QUESTIONÁRIO DE SAÚDE DA CRIANÇA E DO ADULTO</h3></Strong><br>

 
    <form id="register-form" method="post"  action="back-end/AppController.php?acao=atualizar-ficha&id=<?php echo $p->id_ficha; ?> " onsubmit="return valida_form()">

        <div class="col text-center half-box spacing">
            <label for="name" align="left">Nome do paciente </label>
            <input type="name" name="name" id="name" placeholder="Digite o nome do paciente" data-min-length="3" value="<?php echo $p->nome; ?>" class="data">
        </div>
        <div class="col text-center half-box spacing">
        <label for="register" align="left">Prontuário</label>
               <input type="text" name="register" id="register" placeholder="Digite o cadastro do paciente" data-required value="<?php echo $p->id_prontuario; ?>" class="data">
        </div>
        <div class="col  half-box spacing" align="left">
               <label for="queixa" align="left">Queixa principal</label>
               <textarea id="queixa" name="queixa" cols="50" rows="3" placeholder="Digite aqui sua principal queixa" class="data"><?php echo $p->queixa_principal; ?></textarea>     
        </div>

        <div class="col half-box spacing" align="left">
        <label for="doenca-atual">História da doença atual</label>
               <textarea id="doenca-atual" name="doenca-atual" cols="50" rows="3" placeholder="Digite aqui o histórcio da doença" class="data"><?php echo $p->historia_doenca; ?></textarea>  

        </div>
        
        <div class="container">
        <br><Strong><h3>Questionário de saude</h3></Strong><br>
          <div class="row col-lg-12">
            <div class="col-lg-4">
            
               <label for="q-1">1- Já teve hemorragia?</label><br>
               <select name="hemorragia" id="q-1" class="data">
                      <option value="sim" <?php echo $p->hemorragia =='sim'?'selected':'';?>>Sim</option>
                      <option value="nao" <?php echo $p->hemorragia =='nao'?'selected':'';?>>Não</option>
              </select>      
            </div>

            <div class="col-lg-4">

            <label for="q-2">2- Sofre(u) de alergia?</label><br>
               <select name="alergia" id="q-2" class="data">
                      <option value="sim" <?php echo $p->alergia =='sim'?'selected':'';?>>Sim</option>
                      <option value="nao" <?php echo $p->alergia =='nao'?'selected':'';?>>Não</option>
              </select>       
            </div> 

            <div class="col-lg-4">

<label for="q-3">3- Teve reumatismo infeccioso?</label><br>
<select name="reumatismo" id="q-3" class="data">
       <option value="sim" <?php echo $p->reumatismo =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->reumatismo =='nao'?'selected':'';?>>Não</option>
</select>       
</div> 
<div class="col-lg-4">

<label for="q-4">4- Sofre(u) de distúrbio cardiovascular?</label><br>
<select name="disturbio" id="q-4" class="data">
       <option value="sim" <?php echo $p->disturbio_cardio =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->disturbio_cardio =='nao'?'selected':'';?>>Não</option>
</select>       
</div> 
 <div class="col-lg-4">

  <label for="q-5">5- Sofre(u) de gastrite?</label><br>
               <select name="gastrite" id="q-5" class="data">
                      <option value="sim" <?php echo $p->gastrite =='sim'?'selected':'';?>>Sim</option>
                      <option value="nao" <?php echo $p->gastrite =='nao'?'selected':'';?>>Não</option>
              </select>       
            </div> 

<div class="col-lg-4">
<label for="q-6">6- É diabético ou tem familiares diabéticos?</label><br>
<select name="diabetes" id="q-6" class="data">
       <option value="sim" <?php echo $p->diabetes =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->diabetes =='nao'?'selected':'';?>>Não</option>
</select> 
</div>
<div class="col-lg-4">
<label for="q-7">7- Já desmaiou alguma vez?</label><br>
<select name="desmaio" id="q-7" class="data">
       <option value="sim" <?php echo $p->desmaio =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->desmaio =='nao'?'selected':'';?>>Não</option>
</select> 
</div>
<div class="col-lg-4">
<label for="q-8">8- Está sob tratamento médico?</label><br>
<select name="tratamento_medico" id="q-8" class="data">
       <option value="sim" <?php echo $p->tratamento_medico =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->tratamento_medico =='nao'?'selected':'';?>>Não</option>
</select> 
</div>
<div class="col-lg-4">
<label for="q-9">9- Está tomando algum medicamento?</label><br>
<select name="tomando_medicamento" id="q-9" class="data">
       <option value="sim" <?php echo $p->medicamento =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->medicamento =='nao'?'selected':'';?>>Não</option>
</select> 
</div>
<div class="col-lg-4">
<label for="q-10">10- Esteve doente ou foi operado nos últimos 5 anos?</label><br>
<select name="doente_5anos" id="q-10" class="data">
       <option value="sim" <?php echo $p->doente_operado =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->doente_operado =='nao'?'selected':'';?>>Não</option>
</select> 
</div>  

<div class="col-lg-4">
<label for="q-11">11- Tem hábitos, vícios ou manias?</label><br>
<select name="habitos" id="q-11" class="data">
       <option value="sim" <?php echo $p->manias_vicios =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->manias_vicios =='nao'?'selected':'';?>>Não</option>
</select> 
</div>  

<div class="col-lg-4">
<label for="q-12">12- Tem ansiedade/depressão?</label><br>
<select name="ansiedade_depressao" id="q-12" class="data">
       <option value="sim" <?php echo $p->depressao_ansiedade =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->depressao_ansiedade =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<br><Strong><h3>13-Você e/ou algum familiar teve algumas dessas doenças:</h3></Strong><br><br><br>

<div class="col-lg-4">

<label for="q-13-a">Tuberculose</label><br>
<select name="tuberculose" id="q-13-a" class="data">
       <option value="sim" <?php echo $p->tuberculose =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->tuberculose =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="q-13-b">Sífilis</label>
<select name="sifilis" id="q-14-b" class="data">
       <option value="sim" <?php echo $p->sifilis =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->sifilis =='nao'?'selected':'';?>>Não</option>
</select> 
</div>  

<div class="col-lg-4">
<label for="q-13-c">Hepatite A, B, C</label>

<select name="hepatite" id="q-13-c" class="data">
       <option value="sim" <?php echo $p->hepatite =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->hepatite =='nao'?'selected':'';?>>Não</option>
</select> 
</div>  

<div class="col-lg-4">
<label for="q-13-d">SIDA/AIDS</label>
<select name="sida_aids" id="q-13-d" class="data">
       <option value="sim" <?php echo $p->sida_aids =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->sida_aids =='nao'?'selected':'';?>>Não</option>
</select> 
</div>  
<div class="col-lg-4">
<label for="q-13-e">Sarampo</label>
<select name="sarampo" id="q-13-e" class="data">
       <option value="sim" <?php echo $p->sarampo =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->sarampo =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="q-13-f">Caxumba</label>
<select name="caxumba" id="q-13-f" class="data">
       <option value="sim" <?php echo $p->caxumba =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->caxumba =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="q-13-g">Varicela</label>
<select name="varicela" id="q-13-g" class="data">
       <option value="sim" <?php echo $p->varicela =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->varicela =='nao'?'selected':'';?>>Não</option>
</select> 
</div>  

<div class="col-lg-4">
<label for="q-13-h">Outras</label>
<select name="outras" id="q-13-h" class="data">
       <option value="sim" <?php echo $p->outros =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->outros =='nao'?'selected':'';?>>Não</option>
</select> 
</div> 

<div class="col-lg-4">
<label for="q-13-outras">Outras</label>
    <textarea name="outras_text" id="q-13-outras" cols="1" rows="1" placeholder="Digite qual é a o outro tipo da doença" value="<?php echo $p->outros_txt ?>"></textarea>
</div>  

<div class="col-lg-4">
<label for="q-14">14- É fumante?</label>
<select name="fumante" id="q-14" class="data">
       <option value="sim" <?php echo $p->fumante =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->fumante =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="q-14-freq">Frequência/dia</label>
    <textarea name="fumante_freq" id="q-14-freq" cols="1" rows="1" placeholder="Digite com qual frequencia você fuma"><?php echo $p->fumante_freq?></textarea>
</div>

<br><Strong><h3>Questionário complementar infantil - ODONTOPEDIATRIA</h3></Strong><br><br><br>
<div class="col-lg-4">
<label for="gestacao">1-	História da gestação:</label>
    <textarea  class="data" name="historia_gestacao" id="gestacao" cols="1" rows="3" placeholder="Digite aqui seu Histórico de gestação"><?php echo $p->historia_gestacao?></textarea>
</div>

<div class="col-lg-4">
<label for="parto">Nasceu de parto:</label>
<select name="parto" id="parto" class="data">
       <option value="">SELECIONE</option>
       <option value="normal" <?php echo $p->parto =='normal'?'selected':'';?>>Nomal</option>
       <option value="a forceps" <?php echo $p->parto =='a forceps'?'selected':'';?>>a fórceps</option>
       <option value="cesariana" <?php echo $p->parto =='cesariana'?'selected':'';?>>cesariana</option>
</select> 
</div>

<div class="col-lg-4">
<label for="problema_parto">A criança teve algum problema no parto?</label>
<select name="problema_parto" id="problema_parto" class="data">
       <option value="sim" <?php echo $p->problema_parto =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->problema_parto =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="amamentacao">A amamentação foi:</label>
<select name="amamentacao" id="amamentacao" class="data">
       <option value="natural" <?php echo $p->amamentacao =='natural'?'selected':'';?>>Natural</option>
       <option value="mamadeira" <?php echo $p->amamentacao =='mamadeira'?'selected':'';?>>Mamadeira</option>
</select> 
</div>
<div class="col-lg-4">
<label for="idade_amamentacao">Até qual idade foi a amamentação?</label>
<select name="idade_amamentacao" id="idade_amamentacao" class="data">
       <option value="">SELECIONE</option>
       <option value="6 meses" <?php echo $p->idade_amamentacao =='6 meses'?'selected':'';?>>6 meses</option>
       <option value="1 ano" <?php echo $p->idade_amamentacao =='1 ano'?'selected':'';?>>1 ano</option>
       <option value="2 anos" <?php echo $p->idade_amamentacao =='2 anos'?'selected':'';?>>2 anos</option>
       <option value="3 anos" <?php echo $p->idade_amamentacao =='3 anos'?'selected':'';?>>3 anos</option>
       <option value="4 anos" <?php echo $p->idade_amamentacao =='4 anos'?'selected':'';?>>4 anos</option>
       <option value="mais de 4 anos" <?php echo $p->idade_amamentacao =='mais de 4 anos'?'selected':'';?>> mais de 4 anos</option>
</select> 
</div>

<div class="col-lg-4">
<label for="anestesia">Já lhe foi dito para não tomar anestesia local?</label>
<select name="anestesia_local" id="anestesia" class="data">
       <option value="sim" <?php echo $p->anestesia =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->anestesia =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="doenca_grave">Já teve ou viveu com alguém que tivesse doença grave e contagiosa?</label>  
<select name="doenca_grave" id="doenca_grave" class="data">
       <option value="sim" <?php echo $p->doenca_grave =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->doenca_grave =='nao'?'selected':'';?>>Não</option>
</select> 
</div>

<div class="col-lg-4">
<label for="vacinada">A criança já foi vacinada?</label>
<select name="vacinada" id="vacinada" class="data">
       <option value="sim" <?php echo $p->crianca_vacinada =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->crianca_vacinada =='nao'?'selected':'';?>>Não</option>
</select> 
</div>


<br><Strong><h3>CONDUTA DA CRIANÇA</h3></Strong><br><br><br>

<div class="col-lg-4">
<label for="primeiros_anos">Durante os 2 primeiros anos de vida:</label><br>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('sentou-se', $checkAnos) ?'checked="checked"':'';?> value="sentou-se" name="dois_primeiros_anos[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  sentou-se
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('engatinhou', $checkAnos) ?'checked="checked"':'';?> value="engatinhou" name="dois_primeiros_anos[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  engatinhou
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('andou', $checkAnos) ?'checked="checked"':'';?> value="andou" name="dois_primeiros_anos[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  andou
  </label>
</div><div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('falou', $checkAnos) ?'checked="checked"':'';?> value="falou" name="dois_primeiros_anos[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  falou
  </label>
</div>

</div>


<div class="col-lg-4">
<label for="aprendizado">No lar e na escola: teve alguma dificuldade no aprendizado?</label><br>
<select name="aprendizado" id="aprendizado" class="data">
       <option value="sim" <?php echo $p->lar_escola =='sim'?'selected':'';?>>Sim</option>
       <option value="nao" <?php echo $p->lar_escola =='nao'?'selected':'';?>>Não</option>
     
</select> 
</div>

<div class="col-lg-4">
<label for="estado_animico">Estado anímico: </label><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('triste', $checkEstado) ?'checked="checked"':'';?>  value="triste" name="estado_animico[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Triste
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('alegre', $checkEstado) ?'checked="checked"':'';?> value="alegre" name="estado_animico[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Alegre
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('tranquilo', $checkEstado) ?'checked="checked"':'';?> value="tranquilo" name="estado_animico[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Traquilo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('inquieto', $checkEstado) ?'checked="checked"':'';?> value="inquieto" name="estado_animico[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Inquieto
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('timido', $checkEstado) ?'checked="checked"':'';?>  value="timido" name="estado_animico[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Tímido
  </label>
  </div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('assustado', $checkEstado) ?'checked="checked"':'';?> value="assustado" name="estado_animico[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Assustado
  </label>
</div>
</div>

<div class="col-lg-4">
<label for="sono">Tem sono: </label><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('tranquilo', $checkSono) ?'checked="checked"':'';?> value="tranquilo" name="sono[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Tranquilo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('intranquilo', $checkSono) ?'checked="checked"':'';?> value="intranquilo" name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Intraquilo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('pesadelos', $checkSono) ?'checked="checked"':'';?> value="pesadelos" name="sono[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Pesadelos
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('sonambolismo', $checkSono) ?'checked="checked"':'';?> value="sonambolismo"  name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Sonambolismo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox"  <?php echo in_array('insonia', $checkSono) ?'checked="checked"':'';?> value="insonia" name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Insônia
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('terror noturno', $checkSono) ?'checked="checked"':'';?> value="terror noturno"  name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Terror Noturo
  </label>
</div>
</div>

<div class="col-lg-4">
<label for="conduta_psicomotora">Conduta psicomotora: </label><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('postura normal', $checkConduta) ?'checked="checked"':'';?> value="postura normal" name="conduta_psicomotora[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Postura Normal
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('postura alterada', $checkConduta) ?'checked="checked"':'';?> value="postura alterada"  name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Postura Alterada
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('fonacao normal', $checkConduta) ?'checked="checked"':'';?> value="fonacao normal"  name="conduta_psicomotora[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Fonação Normal
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('disturbios da fala', $checkConduta) ?'checked="checked"':'';?> value="disturbios da fala" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Distúrbios da fala
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('enurese noturna', $checkConduta) ?'checked="checked"':'';?> value="enurese noturna" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Enurese noturna 
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('alguma paralisia', $checkConduta) ?'checked="checked"':'';?> value="alguma paralisia" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Alguma paralisia
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('descontrole dos esfincteres', $checkConduta) ?'checked="checked"':'';?> value="descontrole dos esfincteres" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Descontrole dos esfíncteres 
  </label>
</div>
</div>

<div class="col-lg-4">
<label for="alimentacao">Alimentação: </label><br>
<select name="alimentacao" id="alimentacao" class="data">
       <option value="">SELECIONE</option>
       <option value="rejeita" <?php echo $p->alimentacao =='rejeita'?'selected':'';?>>Rejeita </option>
       <option value="alimenta-se normalmente" <?php echo $p->alimentacao =='alimenta-se normalmente'?'selected':'';?>>Alimenta-se normalmente</option>
       <option value="supra alimenta-se" <?php echo $p->alimentacao =='supra alimenta-se'?'selected':'';?>>Supra alimenta-se </option>           
</select> 
</div>

<div class="col-lg-4">
<label for="sociabilidade">Sociabilidade: </label><br>
<select name="sociabilidade" id="sociabilidade" class="data">
       <option value="">SELECIONE</option>
       <option value="isolada" <?php echo $p->sociabilidade =='isolada'?'selected':'';?>>Isolada</option>
       <option value="agressiva" <?php echo $p->sociabilidade =='agressiva'?'selected':'';?>> Agressiva </option>
       <option value="relacoes normais" <?php echo $p->sociabilidade =='relacoes normais'?'selected':'';?>>Relações normais </option>
                 
</select> 
</div>

<div class="col-lg-4">
<label for="patologia_conduta"> Apresenta alguma patologia de conduta</label><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox"  <?php echo in_array('tiques', $checkCondutaPatologia) ?'checked="checked"':'';?> value="tiques" name="patologia_conduta[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Tiques
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('fobias', $checkCondutaPatologia) ?'checked="checked"':'';?> value="fobias" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Fobias
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('ansiedade', $checkCondutaPatologia) ?'checked="checked"':'';?> value="ansiedade" name="patologia_conduta[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Ansiedade
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('medo', $checkCondutaPatologia) ?'checked="checked"':'';?> value="medo" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Medo 
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('birras', $checkCondutaPatologia) ?'checked="checked"':'';?> value="birras" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Birras
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" <?php echo in_array('ciumes', $checkCondutaPatologia) ?'checked="checked"':'';?> value="ciumes" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Ciumes
  </label>
</div>

</div>

<div class="col-lg-4">
<label for="observacoes">Observações:</label><br>
    <textarea class="data" name="observacoes" id="observacoes" cols="1" rows="3" placeholder="Digite aqui suas observações"><?php echo $p->observacoes; ?></textarea>
</div>


<br><Strong><h3>Exame Físico:	N= Normal / A= Alterado</h3></Strong><br><br><br>
<div class="col-lg-4">
<label for="labios">	Lábios: </label><br>
<select name="labios" id="labios" class="data">
       <option value="n" <?php echo $p->labios =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->labios =='a'?'selected':'';?>>A</option>
       </select>    
     
</div>
<div class="col-lg-4">
<label for="mucosa_jugal">Mucosa Jugal: </label><br>
<select name="mucosa_jugal" id="mucosa_jugal" class="data">
       <option value="n" <?php echo $p->mucosa_jugal =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->mucosa_jugal =='a'?'selected':'';?>>A</option>
       </select>       
     
</div>

<div class="col-lg-4">
<label for="lingua">Lingua: </label><br>
<select name="lingua" id="lingua" class="data">
       <option value="n" <?php echo $p->lingua =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->lingua =='a'?'selected':'';?>>A</option>
       </select>     
     
</div>

<div class="col-lg-4">
<label for="soalho">Soalho da boca: </label><br>
<select name="soalho" id="soalho" class="data">
       <option value="n" <?php echo $p->soalho_boca =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->soalho_boca =='a'?'selected':'';?>>A</option>
       </select>      
</div>
<div class="col-lg-4">
<label for="palato_duro">Palato duro:</label><br>
<select name="palato_duro" id="palato_duro" class="data">
       <option value="">SELECIONE</option>
       <option value="n" <?php echo $p->palato_duro =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->palato_duro =='a'?'selected':'';?>>A</option>
       </select>         
</div>

<div class="col-lg-4">
<label for="garganta">	Garganta:</label><br>
<select name="garganta" id="garganta" class="data">
       <option value="n" <?php echo $p->garganta =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->garganta =='a'?'selected':'';?>>A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="palato_mole">Palato Mole:</label><br>
<select name="palato_mole" id="palato_mole" class="data">
       <option value="n" <?php echo $p->palato_mole =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->palato_mole =='a'?'selected':'';?>>A</option>
       </select>       
</div>

<div class="col-lg-4">
<label for="mucosa_alveolar">Mucosa Alveolar:</label><br>
<select name="mucosa_alveolar" id="mucosa_alveolar" class="data">
       <option value="n" <?php echo $p->mucosa_alveolar =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->mucosa_alveolar =='a'?'selected':'';?>>A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="gengivas"> Gengivas:</label><br>
<select name="gengivas" id="gengivas" class="data">
       <option value="n" <?php echo $p->gengivas =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->gengivas =='a'?'selected':'';?>>A</option>
       </select>         
</div>


<div class="col-lg-4">
<label for="glandulas">Glândulas Salivares:</label><br>
<select name="glandulas" id="glandulas" class="data">
       <option value="n" <?php echo $p->glandulas =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->glandulas =='a'?'selected':'';?>>A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="linfonodos">Linfonodos:</label><br>
<select name="linfonodos" id="linfonodos" class="data">
       <option value="n" <?php echo $p->linfonodos =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->linfonodos =='a'?'selected':'';?>>A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="atm">ATM:</label><br>
<select name="atm" id="atm" class="data">
       <option value="n" <?php echo $p->atm =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->atm =='a'?'selected':'';?>>A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="mastigadores">Músculos Mastigadores:</label><br>
<select name="mastigadores" id="mastigadores" class="data">
       <option value="n" <?php echo $p->musculos =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->musculos =='a'?'selected':'';?>>A</option>
       </select>       
</div>


<div class="col-lg-4">
<label for="oclusao">Oclusão:</label><br>
<select name="oclusao" id="oclusao" class="data">
       <option value="n" <?php echo $p->oclusao =='n'?'selected':'';?>>N</option>
       <option value="a" <?php echo $p->oclusao =='a'?'selected':'';?>>A</option>
  </select>        
</div>
<div class="col-lg-4">
<label for="alteracoes_encontradas">Alterações encontradas:</label><br>
    <textarea class="data" name="alteracoes_encontradas" id="alteracoes_encontradas" cols="1" rows="3" placeholder="Digite aqui suas observações"><?php echo $p->alteracoes;?></textarea>
</div>

<div class="col-lg-4">
<label for="pressao_max">PRESSÃO ARTERIAL MÁXIMA:</label><br>
    <input  class="data" type="text" id="pressao_max" name="pressao_max" placeholder="Máxima mmHG  EX: 15X10" value="<?php echo $p->pressao_max;?>">
</div>
<div class="col-lg-4">
<label for="pressao_min">PRESSÃO ARTERIAL MINIMA:</label><br>
    <input  class="data" type="text" id="pressao_min" name="pressao_min" placeholder="Máxima mmHG  EX: 15X10" value="<?php echo $p->pressao_min;?>">
</div>

<div class="col-lg-4">
<label for="diagnostico_presuntivo">Diagnóstico presuntivo:</label><br>
    <textarea  class="data" name="diagnostico_presuntivo" id="diagnostico_presuntivo" cols="1" rows="1" placeholder="Digite aqui suas observações"><?php echo $p->diagnostico_presuntivo;?></textarea>
</div>

<div class="col-lg-4">
<label for="exames_complementares">Exames complementares:</label><br>
    <textarea  class="data" name="exames_complementares" id="exames_complementares" cols="1" rows="1" placeholder="Digite aqui suas observações"><?php echo $p->exames;?></textarea>
</div>

<div class="col-lg-4">
<label for="diagnostico_definitivo">Diagnóstico definitivo:</label><br>
    <textarea class="data" name="diagnostico_definitivo" id="diagnostico_definitivo" cols="1" rows="1" placeholder="Digite aqui suas observações"><?php echo $p->diagnostico_definitivo;?></textarea>
</div>

<div class="col-lg-4">
<label for="tratamento">Tratamento/Proservação:</label><br>
    <textarea class="data" name="tratamento" id="tratamento" cols="1" rows="1" placeholder="Digite aqui suas observações"><?php echo $p->tratamento;?></textarea>
</div>
<div class="col-lg-4">
<label for="plano_tratamento">Plano de Tratamento:</label><br>
    <textarea class="data" name="plano_tratamento" id="plano_tratamento" cols="1" rows="1" placeholder="Digite aqui suas observações"><?php echo $p->plano_tratamento;?></textarea>
</div>
<div class="col-lg-4">
<label for="precisa_medicacao">Precisa de Medicação?</label><br>
<select class="data" name="precisa_medicacao" id="precisa_medicacao">
       <option value="nao" <?php echo $p->medicacao =='nao'?'selected':'';?>>Não</option>
       <option value="sim" <?php echo $p->medicacao =='sim'?'selected':'';?>>Sim</option>
       <textarea name="medicacao_txt" id="medicacao_txt" cols="1" rows="1" placeholder="Digite aqui os medicamentos necessários..."  maxlength="50"><?php echo $p->medicacao_txt;?></textarea>
  </select>        
</div>
<div class="col-lg-4">
<label for="data_ficha">Data do preenchimento da ficha:</label><br>
<input type="date" name="data_ficha" id="data_ficha" class="data" value="<?php echo $p->data_ficha;?>">      
</div>
<div id="check" class="form-check">
<label id="check" class="form-check-label" for="atendimentoUrgente">Atendimento de Urgência (Estágio Sup. em Clínica Odontológica Integrada – URGÊNCIA)</label>
  <input class="form-check-input" type="checkbox" id="atendimentoUrgente" value="true" name="urgencia" <?php echo $p->urgencia == 1 ?'checked="checked"':'';?>>
  
</div>

  </div>  
      <br></div>
      <div class="full-box">
                    <input id="btn-submit" type="submit"  name="button" value="Atualizar">
                    <a class="btn btn-success"  href="home.php" id="btn-voltar">Voltar</a>
                    <a class="btn btn-danger" href="back-end/AppController.php?acao=excluir-ficha&id=<?php echo $p->id_ficha ?>">Exluir </a>
                </div>  
          </div> 
              
    </form>
</div>
   
    <p class="error-validation template"></p>
       <script src="assets/js/index.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body><br>
<footer>
    <strong><p class="text-center">Todos os direitos reservados</p></strong>
</footer>
</html>