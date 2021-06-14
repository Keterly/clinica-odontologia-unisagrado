
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

<body class="col-12">
<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location: login.php');
}
?>

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
 
   
    <div class="col-12" id="main-containerCad">
    <div id="msg-required" class="alert alert-danger" role="alert"></div>

    <?php 
         
         if(isset($_SESSION['msg-cadastro']) && $_SESSION['msg-cadastro'] == false){
           ?>

             <div id="msg-erro" class="alert alert-danger" role="alert">
             "Erro ao cadastrar paciente!
             </div>
             <br>
         <?php 
           unset($_SESSION['msg-cadastro']);
         }
     
 
         ?>  

         <h1>FICHA DE IDENTIFICAÇÃO DO PACIENTE</h1>
            <form id="register-form" method="post"  action="back-end/AppController.php?acao=cadastrar" onsubmit="return valida_form()">
                <div class="full-box">
                    <label for="name">Nome Completo</label>
                    <input type="name" name="name" id="name" placeholder="Digite o nome Completo" data-min-length="3" class="data">
                  </div>
                <div class="half-box spacing">
                    <label for="data">Data de Nascimento</label>
                    <input type="date" name="data" id="data" placeholder="Digite a data Nascimento" data-required data-min-length="8" class="data">
            
            </div>
        <div class="col-lg-4">
            <label for="sexo">SEXO: </label>
            <select name="sexo" id="sexo" class="data">
                <option value="">SELECIONE</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </select>    
        </div>
        <div class="col-lg-4" name="cor" id="cor">
            <label for="labios">COR: </label>
            <select name="cor" id="cor" class="data">
                <option value="">SELECIONE</option>
                <option value="branca">BRANCA</option>
                <option value="preta">PRETA</option>
                <option value="parda">PARDA</option>
                <option value="amarela">AMARELA</option>
                <option value="indigena">INDIGENA</option>
                <option value="outras">OUTRAS</option>
            </select>    
        </div>

                <div class="half-box spacing">
                    <label for="rg">RG:</label>
                    <input type="text" name="rg" onkeypress="$(this).mask('00.000.000-0');" placeholder="EX: 00.000.000-0" class="data">
                </div>
              
                <div class="half-box spacing">
                    <label for="cpf">CPF:</label>
                    <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" placeholder="EX: 000.000.000-00" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="peso">Peso:</label>
                    <input type="text"  name="peso" maxlength="5" onkeypress="$(this).mask('900,00', {reverse: true});"
                    placeholder="EX: 00,00" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="altura">Altura:</label>
                    <input type="text" name="altura" maxlength="5"  onkeypress="$(this).mask('0,00', {reverse: true});"  placeholder="EX: 0,00" class="data">
                </div>
               
                <div class="half-box spacing">
                    <label for="escolaridade">Escolaridade</label>
                    <select id="escolaridade" name="escolaridade" class="data">
                        <option value="">SELECIONE</option>
                        <option value="fundamental incompleto">Fundamental Incompleto</option>
                        <option value="fundamental completo">Fundamental Completo</option>
                        <option value="medio incompleto">Médio Incompleto</option>
                        <option value="medio completo">Médio Completo</option>
                        <option value="superior incompleto">Superior Incompleto</option>
                        <option value="superior completo">Superior Completo</option>
                        <option value="pos graduacao incompleto">Pós Graduação Incompleto</option>
                        <option value="pos graduacao completo">Pós Graduação Completo</option>
                        <option value="mestrado incompleto">Pós Gradução - Mestrado Incompleto</option>
                        <option value="mestrado completo">Pós Graduação - Mestrado Completo</option>
                        <option value="doutorado incompleto">Pós Graduação - Doutorado Incompleto</option>
                        <option value="doutorado completo">Pós Graduação - Doutorado Completo</option>
                    </select>
                </div>
                <div class="half-box spacing">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" placeholder="Nome da profissão" data-required data-min-length="3"  maxlength="30" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="naturalidade">Naturalidade</label>
                    <select name="naturalidade" id="naturalidade" class="data">
                      <option value="">SELECIONE</option>
                  </select> 
                </div>
                
                <div class="half-box spacing">
                    <label for="estadoCivil">Estado Civil</label>
                    <select name="estadoCivil" id="estadoCivil" class="data">
                        <option value="">SELECIONE</option>
                        <option value="casado(a)">Casado(a)</option>
                        <option value="solteiro(a)">Solteiro(a)</option>
                        <option value="viuvo(a)">Viuvo(a)</option>
                        <option value="divorciado(a)">Divorciado(a)</option>
                    </select><br>
                    <br><label for="estado">Estado</label>
                  <select name="estado" id="estado" class="data">
                      <option value="">SELECIONE</option>
                  </select> 
                </div>
                
                <div class="full-box">
                    <label for="nacionalidade">Nacionalidade</label>
                    <input type="text" name="nacionalidade" id="nacionalidade" placeholder="digite a sua Nacionalidade" data-required data-min-length="3"  maxlength="30" class="data">
                </div>

                <div class="full-box">
                    <br><label for="filiacaoPai">Filiação Pai</label>
                    <input type="name" name="filiacaoPai" id="filiacaoPai" placeholder="Digite o nome do Pai" data-min-length="3"  maxlength="30" class="data">
                  </div>
                <div class="half-box spacing">
                    <label for="naturalidadepai">Nacionalidade do Pai</label>
                    <input type="text" name="nacionalidadePai" id="nacionalidadepai" placeholder="digite a Naturalidade do Pai" data-required data-min-length="3"  maxlength="30" class="data">
                </div>
                  <div class="full-box">
                    <label for="name">Filiação Mãe</label>
                    <input type="name" name="filiacaoMae" id="filiacaomae" placeholder="Digite o nome da Mãe" data-min-length="3" class="data">
                  </div>
                  <div class="half-box spacing">
                    <label for="nacionalidadeMae">Nacionalidade Mãe</label>
                    <input type="text" name="nacionalidadeMae" id="nacionalidadeMae" placeholder="digite a sua Nacionalidade da Mãe" data-required data-min-length="3"  maxlength="30" class="data">
                </div>

                  <div class="half-box spacing">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" onkeypress="$(this).mask('(00) 0000-0000')" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="telefoneCelular">Telefone Celular</label>
                    <input type="text" name="celular" onkeypress="$(this).mask('(00) 00000-0000')" class="data">
                </div>
                <div class="full-box">
                    <label for="endereco">Endereço</label>
                    <input type="name" name="endereco" id="endereco" placeholder="Digite o Endereço com o número" data-min-length="3"  maxlength="50" class="data">
                  </div>
                  <div class="half-box spacing">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep"  onkeypress="$(this).mask('00.000-000')" placeholder="EX: 00.000-000" class="data">
                </div>

                  <div class="half-box spacing">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" placeholder="digite o nome do bairro" data-required data-min-length="3"  maxlength="50" class="data">
                </div>

                <div class="half-box spacing">
                    <label for="cidade">Cidade</label>
                    <select name="cidade" id="cidade" class="data">
                      <option value="">SELECIONE</option>
                  </select> 
                </div>
              
                
                <div class="half-box spacing">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" id="complemento" placeholder="digite um Complemento" data-required data-min-length="3"  maxlength="30">
                </div>
                <div class="half-box spacing">
                    <label for="data_cadastro">Data do cadastro:</label><br>
                    <input type="date" name="data_cadastro" id="data_cadastro" class="data">      
                </div>
                <div class="full-box">
                    <input id="btn-submit" type="submit" value="Registrar">
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