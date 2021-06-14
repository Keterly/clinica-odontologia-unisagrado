
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

$acao = 'cadastro-user';

require 'back-end/AppController.php';
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
    <div id="main-containerCad">
    <div id="msg-required" class="alert alert-danger" role="alert"></div>

         <?php 
      if(isset($_SESSION['msg-atualizar']) && $_SESSION['msg-atualizar'] == false){ ?>
         <div id="msg-erro" class="alert alert-danger" role="alert">
         Erro ao atualizar. Verifique os dados informados!
        </div>
        <br>
          
      <?php
        unset($_SESSION['msg-atualizar']);
      }
         if(isset($_SESSION['msg-atualizar']) && $_SESSION['msg-atualizar'] == true){
          ?>
          <div id="msg-success" class="alert alert-success" role="alert">
            Dados atualizados com sucesso!
        </div>
        <br>
        <?php 
           unset($_SESSION['msg-atualizar']);
         }
         if(isset($_SESSION['msg-excluir']) && $_SESSION['msg-excluir'] == false){
          ?>
          <div id="msg-erro" class="alert alert-danger" role="alert">
          Erro ao excluir paciente!
        </div>
        <br>
        <?php 
          unset($_SESSION['msg-excluir']);
        }

        ?>

          <h1>FICHA DE IDENTIFICAÇÃO DO PACIENTE</h1>
            <form id="register-form" method="post"  action="back-end/AppController.php?acao=atualizar&prontuario=<?php echo $p->prontuario; ?>" onsubmit="return valida_form()">
            <div id="msg-required" class="alert alert-danger" role="alert"></div>
                <div class="full-box">
                    <label for="name">Nome Completo</label>
                    <input type="name" name="name" id="name" placeholder="Digite o nome Completo" data-min-length="3" value="<?php echo $p->nome; ?>" class="data">
                  </div>
                <div class="half-box spacing">
                    <label for="data">Data de Nascimento</label>
                    <input type="date" name="data" id="data" placeholder="Digite a data Nascimento" data-required data-min-length="8" value="<?php echo $p->data_nascimento; ?>" class="data">
                </div>
        <div class="col-lg-4">
            <label for="sexo">SEXO: </label>
            <select name="sexo" id="sexo" class="data">
                <option value="">SELECIONE</option>
                <option value="M" <?php echo $p->sexo =='M'?'selected':'';?>>Masculino</option>
                <option value="F" <?php echo $p->sexo =='F'?'selected':'';?>>Feminino</option>
            </select>    
        </div>
        <div class="col-lg-4" name="cor" id="cor">
            <label for="labios">COR: </label>
            <select name="cor" id="cor" class="data">
                <option value="">SELECIONE</option>
                <option value="branca" <?php echo $p->cor =='branca'?'selected':'';?>>BRANCA</option>
                <option value="preta" <?php echo $p->cor =='preta'?'selected':'';?>>PRETA</option>
                <option value="parda" <?php echo $p->cor =='parda'?'selected':'';?>>PARDA</option>
                <option value="amarela" <?php echo $p->cor =='amarela'?'selected':'';?>>AMARELA</option>
                <option value="indigena" <?php echo $p->cor =='indigena'?'selected':'';?>>INDIGENA</option>
                <option value="outras" <?php echo $p->cor =='outras'?'selected':'';?>>OUTRAS</option>
            </select>    
        </div>
                <div class="half-box spacing">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" onkeypress="$(this).mask('00.000.000-0');" placeholder="EX: 00.000.000-0" value="<?php echo $p->rg; ?>" class="data">
                </div>
              
                <div class="half-box spacing">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" onkeypress="$(this).mask('000.000.000-00');" placeholder="EX: 000.000.000-00" value="<?php echo $p->cpf; ?>" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="peso">Peso</label>
                    <input type="text"  name="peso" maxlength="5" onkeypress="$(this).mask('90,00', {reverse: true});"
                    placeholder="EX: 00,00" value="<?php echo $p->peso; ?>" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="altura">Altura</label>
                    <input type="text" name="altura" maxlength="5"  onkeypress="$(this).mask('90,00', {reverse: true});"  placeholder="EX: 00,00" value="<?php echo $p->altura; ?>" class="data">
                </div>
               
                <div class="half-box spacing">
                    <label for="escolaridade">Escolaridade</label>
                    <select id="escolaridade" name="escolaridade" class="data">
                        <option value="">SELECIONE</option>
                        <option value="fundamental incompleto" <?php echo $p->escolaridade =='fundamental incompleto'?'selected':'';?>>Fundamental Incompleto</option>
                        <option value="fundamental completo" <?php echo $p->escolaridade =='fundamental completo'?'selected':'';?>>Fundamental Completo</option>
                        <option value="medio incompleto" <?php echo $p->escolaridade =='medio incompleto'?'selected':'';?>>Médio Incompleto</option>
                        <option value="medio completo" <?php echo $p->escolaridade =='medio completo'?'selected':'';?>>Médio Completo</option>
                        <option value="superior incompleto" <?php echo $p->escolaridade =='superior incompleto'?'selected':'';?>>Superior Incompleto</option>
                        <option value="superior completo" <?php echo $p->escolaridade =='superior completo'?'selected':'';?>>Superior Completo</option>
                        <option value="pos graduacao incompleto" <?php echo $p->escolaridade =='pos graduacao incompleto'?'selected':'';?>>Pós Graduação Incompleto</option>
                        <option value="pos graduacao completo" <?php echo $p->escolaridade =='pos graduacao completo'?'selected':'';?>>Pós Graduação Completo</option>
                        <option value="mestrado incompleto" <?php echo $p->escolaridade =='mestrado incompleto'?'selected':'';?>>Pós Gradução - Mestrado Incompleto</option>
                        <option value="mestrado completo" <?php echo $p->escolaridade =='mestrado completo'?'selected':'';?>>Pós Graduação - Mestrado Completo</option>
                        <option value="doutorado incompleto" <?php echo $p->escolaridade =='doutorado incompleto'?'selected':'';?>>Pós Graduação - Doutorado Incompleto</option>
                        <option value="doutorado completo" <?php echo $p->escolaridade =='doutorado completo'?'selected':'';?>>Pós Graduação - Doutorado Completo</option>
                    </select>
                </div>
                <div class="half-box spacing">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" placeholder="Nome da profissão" data-required data-min-length="8" value="<?php echo $p->profissao; ?>" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="naturalidade">Naturalidade</label>
                    <input type="hidden" value="<?php echo $p->naturalidade; ?>" id="naturalidadeValue">
                    <select name="naturalidade" id="naturalidade" class="data">
                      <option value="">SELECIONE</option>
                    </select>
                </div>
                <div class="half-box spacing">
                    <label for="estadoCivil">Estado Civil</label>
                    <select name="estadoCivil" id="estadoCivil" class="data">
                        <option value="" <?php echo $p->estado_civil =='selecione'?'selected':'';?>>SELECIONE</option>
                        <option value="casado(a)" <?php echo $p->estado_civil =='casado(a)'?'selected':'';?> >Casado(a)</option>
                        <option value="solteiro(a)" <?php echo $p->estado_civil =='solteiro(a)'?'selected':'';?>>Solteiro(a)</option>
                        <option value="viuvo(a)" <?php echo $p->estado_civil =='viuvo(a)'?'selected':'';?>>Viuvo(a)</option>
                        <option value="divorciado(a)" <?php echo $p->estado_civil =='divorciado(a)'?'selected':'';?>>Divorciado(a)</option>
                    </select><br>
                    <br><label for="estado">Estado</label>
                    <input type="hidden" value="<?php echo $p->estado; ?>" id="estadoValue">
                  <select name="estado" id="estado" class="data">
                      <option value="">SELECIONE</option>
                    </select>
                </div>                    
                <div class="full-box">
                    <label for="nacionalidade">Nacionalidade</label>
                    <input type="text" name="nacionalidade" id="nacionalidade" placeholder="digite a sua Nacionalidade" data-required data-min-length="3"  maxlength="30" class="data" value="<?php echo $p->nacionalidade ?>">
                </div>
                <div class="full-box">
                    <br><label for="filiacaoPai">Filiação Pai</label>
                    <input type="name" name="filiacaoPai" id="filiacaoPai" placeholder="Digite o nome do Pai" data-min-length="3"  maxlength="30" class="data" value="<?php echo $p->filiacao_pai; ?>">
                  </div>
                  <div class="half-box spacing">
                    <label for="naturalidadepai">Nacionalidade do Pai</label>
                    <input type="text" name="nacionalidadePai" id="nacionalidadepai" placeholder="digite a Naturalidade do Pai" data-required data-min-length="3"  maxlength="30" class="data" value="<?php echo $p->nacionalidade_pai; ?>">
                </div>
                  <div class="full-box">
                    <label for="name">Filiação Mãe</label>
                    <input type="name" name="filiacaoMae" id="filiacaomae" placeholder="Digite o nome da Mãe" data-min-length="3" class="data" value="<?php echo $p->filiacao_mae; ?>">
                  </div>
                  <div class="half-box spacing">
                    <label for="nacionalidadeMae">Nacionalidade Mãe</label>
                    <input type="text" name="nacionalidadeMae" id="nacionalidadeMae" placeholder="digite a sua Nacionalidade da Mãe" data-required data-min-length="3"  maxlength="30" class="data" value="<?php echo $p->nacionalidade_mae; ?>">
                </div>

                  <div class="half-box spacing">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" onkeypress="$(this).mask('(00) 0000-0000')" value="<?php echo $p->telefone; ?>" class="data">
                </div>
                <div class="half-box spacing">
                    <label for="telefoneCelular">Telefone Celular</label>
                    <input type="text" name="celular" onkeypress="$(this).mask('(00) 00000-0000')" value="<?php echo $p->celular; ?>" class="data">
                </div>

                <div class="full-box">
                    <label for="endereco">Endereço</label>
                    <input type="name" name="endereco" id="endereco" placeholder="Digite o Endereço com o número" data-min-length="3" value="<?php echo $p->endereco; ?>" class="data">
                </div>
                  <div class="half-box spacing">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" onkeypress="$(this).mask('00.000-000')" placeholder="EX: 00.000-000" value="<?php echo $p->cep; ?>" class="data">
                </div>

                  <div class="half-box spacing">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" id="bairro" placeholder="digite o nome do bairro" data-required data-min-length="8" value="<?php echo $p->bairro; ?>" class="data">
                </div>

                <div class="half-box spacing">
                    <label for="cidade">Cidade</label>
                    <input type="hidden" value="<?php echo $p->cidade; ?>" id="cidadeValue">
                    <select name="cidade" id="cidade" class="data">
                      <option value="">SELECIONE</option>
                    </select>
                </div>
              
                <div class="half-box spacing">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" id="complemento" placeholder="digite um Complemento" data-required data-min-length="8" value="<?php echo $p->complemento; ?>">
                </div>
                <div class="half-box spacing">
                    <label for="data_cadastro">Data do cadastro:</label><br>
                    <input type="date" name="data_cadastro" id="data_cadastro" class="data" value="<?php echo $p->data_cadastro;?>">      
                </div>         
                <div class="full-box">
                    <input id="btn-submit" type="submit"  name="button" value="Atualizar">
                    <a class="btn btn-success"  href="home.php" id="btn-voltar">Voltar</a>
                    <a class="btn btn-danger" href="back-end/AppController.php?acao=excluir&prontuario=<?php echo $p->prontuario ?>">Exluir </a>
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