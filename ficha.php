
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
         
         if(isset($_SESSION['msg-cadastro']) && $_SESSION['msg-cadastro'] == false){
           ?>

             <div id="msg-erro" class="alert alert-danger" role="alert">
             Erro ao cadastrar ficha!
             </div>
             <br>
         <?php 
           unset($_SESSION['msg-cadastro']);
         }
     
 
         ?>  
  <br><Strong><h3 class="text-center"> QUESTIONÁRIO DE SAÚDE DA CRIANÇA E DO ADULTO</h3></Strong><br>
 
  <form id="register-form" method="post"  action="back-end/AppController.php?acao=cadastrar-ficha" onsubmit="return valida_form()">

        <div class="col text-center half-box spacing">
            <label for="name" align="left">Nome do paciente </label>
            <input class="data" type="name" name="name" id="name" placeholder="Digite o nome do paciente" data-min-length="3">
        </div>
        <div class="col text-center half-box spacing">
        <label for="register" align="left">Cadastro</label>
               <input class="data" type="text" name="register" id="register" value="<?php if(isset($_GET['id']) && $_GET['id'] != NULL) echo $_GET['id'];  ?>" placeholder="Digite o cadastro do paciente" data-required>
        </div>
        <div class="col  half-box spacing" align="left">
               <label for="queixa" align="left">Queixa principal</label>
               <textarea class="data" id="queixa" name="queixa" cols="50" rows="3" placeholder="Digite aqui sua principal queixa"></textarea>     
        </div>

        <div class="col half-box spacing" align="left">
        <label for="doenca-atual">História da doença atual</label>
               <textarea class="data" id="doenca-atual" name="doenca-atual" cols="50" rows="3" placeholder="Digite aqui o histórcio da doença"></textarea>  

        </div>
        
        <div class="container">
        <br><Strong><h3>Questionário de saude</h3></Strong><br>
          <div class="row col-lg-12">
            <div class="col-lg-4">
            
               <label for="q-1">1- Já teve hemorragia?</label><br>
               <select name="hemorragia" id="q-1" class="data">
                      <option value="nao">Não</option>
                      <option value="sim">Sim</option>
                     
              </select>      
            </div>

            <div class="col-lg-4">

            <label for="q-2">2- Sofre(u) de alergia?</label><br>
               <select name="alergia" id="q-2" class="data">
                      <option value="nao">Não</option>
                      <option value="sim">Sim</option>
                    
              </select>       
            </div> 

            <div class="col-lg-4">

<label for="q-3">3- Teve reumatismo infeccioso?</label><br>
<select name="reumatismo" id="q-3" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select>       
</div> 
<div class="col-lg-4">

<label for="q-4">4- Sofre(u) de distúrbio cardiovascular?</label><br>
<select name="disturbio" id="q-4" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
     
</select>       
</div> 
 <div class="col-lg-4">

  <label for="q-5">5- Sofre(u) de gastrite?</label><br>
               <select name="gastrite" id="q-5" class="data">
                     <option value="nao">Não</option>
                      <option value="sim">Sim</option>
                      
              </select>       
            </div> 

<div class="col-lg-4">
<label for="q-6">6- É diabético ou tem familiares diabéticos?</label><br>
<select name="diabetes" id="q-6" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>
<div class="col-lg-4">
<label for="q-7">7- Já desmaiou alguma vez?</label><br>
<select name="desmaio" id="q-7" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select> 
</div>
<div class="col-lg-4">
<label for="q-8">8- Está sob tratamento médico?</label><br>
<select name="tratamento_medico" id="q-8" class="data">
        <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>
<div class="col-lg-4">
<label for="q-9">9- Está tomando algum medicamento?</label><br>
<select name="tomando_medicamento" id="q-9" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>
<div class="col-lg-4">
<label for="q-10">10- Esteve doente ou foi operado nos últimos 5 anos?</label><br>
<select name="doente_5anos" id="q-10" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select> 
</div>  

<div class="col-lg-4">
<label for="q-11">11- Tem hábitos, vícios ou manias?</label><br>
<select name="habitos" id="q-11" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>  

<div class="col-lg-4">
<label for="q-12">12- Tem ansiedade/depressão?</label><br>
<select name="ansiedade_depressao" id="q-12" class="data">
       <option value="nao">Não</option>   
       <option value="sim">Sim</option>
      
</select> 
</div>

<br><Strong><h3>13-Você e/ou algum familiar teve algumas dessas doenças:</h3></Strong><br><br><br>

<div class="col-lg-4">

<label for="q-13-a">Tuberculose</label><br>
<select name="tuberculose" id="q-13-a" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>

<div class="col-lg-4">
<label for="q-13-b">Sífilis</label>
<select name="sifilis" id="q-14-b" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>  

<div class="col-lg-4">
<label for="q-13-c">Hepatite A, B, C</label>

<select name="hepatite" id="q-13-c" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>  

<div class="col-lg-4">
<label for="q-13-d">SIDA/AIDS</label>
<select name="sida_aids" id="q-13-d" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select> 
</div>  
<div class="col-lg-4">
<label for="q-13-e">Sarampo</label>
<select name="sarampo" id="q-13-e" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>

<div class="col-lg-4">
<label for="q-13-f">Caxumba</label>
<select name="caxumba" id="q-13-f" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>

<div class="col-lg-4">
<label for="q-13-g">Varicela</label>
<select name="varicela" id="q-13-g" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select> 
</div>  

<div class="col-lg-4">
<label for="q-13-h">Outras</label>
<select name="outras" id="q-13-h" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div> 

<div class="col-lg-4">
<label for="q-13-outras">Outras</label>
    <textarea name="outras_text" id="q-13-outras" cols="1" rows="1" placeholder="Digite qual é a o outro tipo da doença"></textarea>
</div>  

<div class="col-lg-4">
<label for="q-14">14- É fumante?</label>
<select name="fumante" id="q-14" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>

<div class="col-lg-4">
<label for="q-14-freq">Frequência/dia</label>
    <textarea name="fumante_freq" id="q-14-freq" cols="1" rows="1" placeholder="Digite com qual frequencia você fuma"></textarea>
</div>

<br><Strong><h3>Questionário complementar infantil - ODONTOPEDIATRIA</h3></Strong><br><br><br>
<div class="col-lg-4">
<label for="gestacao">1-	História da gestação:</label>
    <textarea class="data" name="historia_gestacao" id="gestacao" cols="1" rows="3" placeholder="Digite aqui seu Histórico de gestação"></textarea>
</div>

<div class="col-lg-4">
<label for="parto">Nasceu de parto:</label>
<select name="parto" id="parto" class="data">
       <option value="">SELECIONE</option>
       <option value="normal">Normal</option>
       <option value="a forceps">a fórceps</option>
       <option value="cesariana">cesariana</option>
</select> 
</div>

<div class="col-lg-4">
<label for="problema_parto">A criança teve algum problema no parto?</label>
<select name="problema_parto" id="problema_parto" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
    
</select> 
</div>

<div class="col-lg-4">
<label for="amamentacao">A amamentação foi:</label>
<select name="amamentacao" id="amamentacao" class="data">
       <option value="">SELECIONE</option>
       <option value="natural">Natural</option>
       <option value="mamadeira">Mamadeira</option>
</select> 
</div>
<div class="col-lg-4">
<label for="idade_amamentacao">Até qual idade foi a amamentação?</label>
<select name="idade_amamentacao" id="idade_amamentacao" class="data">
       <option value="">SELECIONE</option>
       <option value="6 meses">6 meses</option>
       <option value="1 ano">1 ano</option>
       <option value="2 anos">2 anos</option>
       <option value="3 anos">3 anos</option>
       <option value="4 anos">4 anos</option>
       <option value="mais de 4 anos"> mais de 4 anos</option>
</select> 
</div>

<div class="col-lg-4">
<label for="anestesia">Já lhe foi dito para não tomar anestesia local?</label>
<select name="anestesia_local" id="anestesia" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select> 
</div>

<div class="col-lg-4">
<label for="doenca_grave">Já teve ou viveu com alguém que tivesse doença grave e contagiosa?</label>  
<select name="doenca_grave" id="doenca_grave" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
      
</select> 
</div>

<div class="col-lg-4">
<label for="vacinada">A criança já foi vacinada?</label>
<select name="vacinada" id="vacinada" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
</select> 
</div>


<br><Strong><h3>CONDUTA DA CRIANÇA</h3></Strong><br><br><br>

<div class="col-lg-4">
<label for="primeiros_anos">Durante os 2 primeiros anos de vida:</label><br>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="sentou-se" name="dois_primeiros_anos[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  sentou-se
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="engatinhou" name="dois_primeiros_anos[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  engatinhou
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="andou" name="dois_primeiros_anos[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  andou
  </label>
</div><div class="form-check">
  <input class="form-check-input" type="checkbox" value="falou" name="dois_primeiros_anos[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  falou
  </label>
</div>

</div>


<div class="col-lg-4">
<label for="aprendizado">No lar e na escola: teve alguma dificuldade no aprendizado?</label><br>
<select name="aprendizado" id="aprendizado" class="data">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
       
     
</select> 
</div>

<div class="col-lg-4">
<label for="estado_animico">Estado anímico: </label>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="triste" name="estado_animico[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Triste
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="alegre" name="estado_animico[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Alegre
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="tranquilo" name="estado_animico[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Traquilo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="inquieto" name="estado_animico[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Inquieto
  </label>
  </div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="timido" name="estado_animico[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Tímido
  </label>
</div><div class="form-check">
  <input class="form-check-input" type="checkbox" value="assustado" name="estado_animico[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Assustado
  </label>
</div>
</div>

<div class="col-lg-4">
<label for="sono">Tem sono: </label><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="tranquilo" name="sono[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Tranquilo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="intranquilo" name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Intraquilo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="pesadelos" name="sono[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Pesadelos
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="sonambolismo"  name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Sonambolismo
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="insonia" name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Insônia
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="terror noturno"  name="sono[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Terror Noturo
  </label>
</div>
</div>

<div class="col-lg-4">
<label for="conduta_psicomotora">Conduta psicomotora: </label><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="postura normal" name="conduta_psicomotora[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Postura Normal
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="postura alterada"  name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Postura Alterada
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="fonacao normal"  name="conduta_psicomotora[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Fonação Normal
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="disturbios da fala" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Distúrbios da fala
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="enurese noturna" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Enurese noturna 
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="alguma paralisia" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Alguma paralisia
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="descontrole dos esfincteres" name="conduta_psicomotora[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Descontrole dos esfíncteres 
  </label>
</div>
</div>

<div class="col-lg-4">
<br><label for="alimentacao">Alimentação: </label>
<select name="alimentacao" id="alimentacao" class="data">
<option value="">SELECIONE</option>
<option value="alimenta-se normalmente">Alimenta-se normalmente</option>
       <option value="rejeita">Rejeita </option>
       <option value="supra alimenta-se">Supra alimenta-se </option>           
</select> 
</div>

<div class="col-lg-4">
<label for="sociabilidade">Sociabilidade: </label><br>
<select name="sociabilidade" id="sociabilidade" class="data">
       <option value="">SELECIONE</option>
       <option value="isolada">Isolada</option>
       <option value="agressiva"> Agressiva </option>
       <option value="relacoes normais">Relações normais </option>
                 
</select> 
</div>

<div class="col-lg-4">
<label for="patologia_conduta"> Apresenta alguma patologia de conduta</label><br>

<div class="form-check">
  <input class="form-check-input data" type="checkbox"  value="tiques" name="patologia_conduta[]" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
  Tiques
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="fobias" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Fobias
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="ansiedade" name="patologia_conduta[]" id="flexCheckChecked">
  <label class="form-check-label" for="flexCheckChecked">
  Ansiedade
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="medo" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Medo  
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="birras" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Birras
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="ciumes" name="patologia_conduta[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Ciumes
  </label>
</div>

</div>

<div class="col-lg-4">
<label for="observacoes">Observações:</label><br>
    <textarea class="data" name="observacoes" id="observacoes" cols="1" rows="3" placeholder="Digite aqui suas observações"></textarea>
</div>


<br><Strong><h3>Exame Físico:	N= Normal / A= Alterado</h3></Strong><br><br><br>
<div class="col-lg-4">
<label for="labios">	Lábios: </label><br>
<select name="labios" id="labios" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>    
     
</div>
<div class="col-lg-4">
<label for="mucosa_jugal">Mucosa Jugal: </label><br>
<select name="mucosa_jugal" id="mucosa_jugal" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>       
     
</div>

<div class="col-lg-4">
<label for="lingua">Lingua: </label><br>
<select name="lingua" id="lingua" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>     
     
</div>

<div class="col-lg-4">
<label for="soalho">Soalho da boca: </label><br>
<select name="soalho" id="soalho" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>      
</div>
<div class="col-lg-4">
<label for="palato_duro">Palato duro:</label><br>
<select name="palato_duro" id="palato_duro" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>         
</div>

<div class="col-lg-4">
<label for="garganta">	Garganta:</label><br>
<select name="garganta" id="garganta" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="palato_mole">Palato Mole:</label><br>
<select name="palato_mole" id="palato_mole" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>       
</div>

<div class="col-lg-4">
<label for="mucosa_alveolar">Mucosa Alveolar:</label><br>
<select name="mucosa_alveolar" id="mucosa_alveolar" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="gengivas"> Gengivas:</label><br>
<select name="gengivas" id="gengivas" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>         
</div>


<div class="col-lg-4">
<label for="glandulas">Glândulas Salivares:</label><br>
<select name="glandulas" id="glandulas" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="linfonodos">Linfonodos:</label><br>
<select name="linfonodos" id="linfonodos" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="atm">ATM:</label><br>
<select name="atm" id="atm" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>        
</div>

<div class="col-lg-4">
<label for="mastigadores">Músculos Mastigadores:</label><br>
<select name="mastigadores" id="mastigadores" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
       </select>       
</div>


<div class="col-lg-4">
<label for="oclusao">Oclusão:</label><br>
<select name="oclusao" id="oclusao" class="data">
       <option value="n">N</option>
       <option value="a">A</option>
  </select>        
</div>
<div class="col-lg-4">
<label for="alteracoes_encontradas">Alterações encontradas:</label><br>
    <textarea class="data" name="alteracoes_encontradas" id="alteracoes_encontradas" cols="1" rows="3" placeholder="Digite aqui suas observações"></textarea>
</div>

<div class="col-lg-4">
<label for="pressao_max">PRESSÃO ARTERIAL MÁXIMA:</label><br>
    <input class="data" type="text" id="pressao_max" name="pressao_max" placeholder="Máxima mmHG  EX: 15X10">
</div>
<div class="col-lg-4">
<label for="pressao_min">PRESSÃO ARTERIAL MINIMA:</label><br>
    <input class="data" type="text" id="pressao_min" name="pressao_min" placeholder="Máxima mmHG  EX: 15X10">
</div>

<div class="col-lg-4">
<label for="diagnostico_presuntivo">Diagnóstico presuntivo:</label><br>
    <textarea class="data" name="diagnostico_presuntivo" id="diagnostico_presuntivo" cols="1" rows="1" placeholder="Digite aqui suas observações"></textarea>
</div>

<div class="col-lg-4">
<label for="exames_complementares">Exames complementares:</label><br>
    <textarea class="data" name="exames_complementares" id="exames_complementares" cols="1" rows="1" placeholder="Digite aqui suas observações"></textarea>
</div>

<div class="col-lg-4">
<label for="diagnostico_definitivo">Diagnóstico definitivo:</label><br>
    <textarea class="data" name="diagnostico_definitivo" id="diagnostico_definitivo" cols="1" rows="1" placeholder="Digite aqui suas observações"></textarea>
</div>

<div class="col-lg-4">
<label for="tratamento">Tratamento/Proservação:</label><br>
    <textarea class="data" name="tratamento" id="tratamento" cols="1" rows="1" placeholder="Digite aqui suas observações"></textarea>
</div>
<div class="col-lg-4">
<label for="plano_tratamento">Plano de Tratamento:</label><br>
    <textarea class="data" name="plano_tratamento" id="plano_tratamento" cols="1" rows="1" placeholder="Digite aqui suas observações"></textarea>
</div>

<div class="col-lg-4">
<label for="precisa_medicacao">Precisa de Medicação?</label><br>
<select name="precisa_medicacao" id="precisa_medicacao">
       <option value="nao">Não</option>
       <option value="sim">Sim</option>
  </select>     
  <textarea name="medicacao_txt" id="medicacao_txt" cols="1" rows="1" placeholder="Digite aqui os medicamentos necessários..."  maxlength="50"></textarea>   
</div>
<div class="col-lg-4">
<label for="data_ficha">Data do preenchimento da ficha:</label><br>
<input class="data" type="date" name="data_ficha" id="data_ficha">      
</div>
<div id="check" class="form-check">
<label id="check" class="form-check-label" for="atendimentoUrgente">Atendimento de Urgência (Estágio Sup. em Clínica Odontológica Integrada – URGÊNCIA)</label>  
  <input class="form-check-input" type="checkbox" value="true" id="atendimentoUrgente" name="urgencia">
</div>

  </div> 
      <br></div>
      <div class="full-box col-md-4">
               <input class="data" id="btnFicha" type="submit" value="Registrar" >
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