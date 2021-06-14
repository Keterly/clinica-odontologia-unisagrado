<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="assets/img/icon.png" />    
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <title>Cliníca Odonto Unisagrado</title>
</head>

<body>
<?php 
session_start();
if(!isset($_SESSION['user'])){
    header('location: login.php');
}
$acao = 'listar';
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
					<a href="cadastro.php">Cadastrar Paciente</a>
					</li>
					<li>
						<a  href="ficha.php">Avaliação do Paciente</a>
					</li>

                    <li >
                    <a href="consulta.php">Consulta</a>
                    </li>
                    <li>  <a  href="back-end/AppController.php?acao=logout" align="right"> <?php echo "{$_SESSION['user']} | Sair" ?> </a></li>
      </ul>
    </nav>
  </header><br><br>


	<div class="container col-lg-8 col-8 ">
         <?php 
      
         if(isset($_SESSION['msg-excluir']) && $_SESSION['msg-excluir'] == true){
          ?>
        <div class="msg-success alert alert-success">Dados excluidos com sucesso!</div>
        <?php 
          unset($_SESSION['msg-excluir']);
        }
        
         if(isset($_SESSION['msg-cadastro']) && $_SESSION['msg-cadastro'] == true){
          ?>
        <div class="msg-success alert alert-success">Dados cadastrados com sucesso!</div>
        <?php 
          unset($_SESSION['msg-cadastro']);
        }

        ?>
      
        <form class="container col-lg-8 col-12" method="POST" action="pesquisar.php">
        <div class="input-group mb-3">
        <label for="paciente">Paciente:</label>
            <input type="text" name="paciente" id="paciente" class="form-control"  placeholder="Digite o Nome do paciente  ">
            <div class="input-group-append">
            <button id="btn" class="btn btn-success">Pesquisar</button>
        </div>
    </div>
        </form>
       
			<table class="col-12">		
                <?php 
                    if(!empty($result)){
                    foreach ($result as $user) {
                      ?>
                      <tr>
                        <td height="89"><p><?php echo $user->nome; ?></p></td>
                        <td height="89"><p>Nº Prontuário: <?php echo $user->prontuario; ?></p></td>
                        <td align="right">
                            <a id="btn" href="atualizar-cadastro.php?prontuario=<?php echo $user->prontuario; ?>" class="btn btn-success text-light">Cadastro</button>
                            <a id="btn" href="atualizar-ficha.php?prontuario=<?php echo $user->prontuario; ?>" class="btn btn-danger text-light">Ficha</button>
                            <a id="btn" href="prontuario.php?prontuario=<?php echo $user->prontuario; ?>" class="btn btn-primary text-light">Prontuário</button>
                         
                        </td>
                    </tr> 
                <?php           
                    }
                }
                ?>			
						
				</table><br><br>    
		</div>

    <p class="error-validation template"></p>
    <script src="assets/js/index.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body><br>
<footer class="footer">
    <strong><p class="text-center">Todos os direitos reservados</p></strong>
</footer>
</html>