
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
         
         if(isset($_SESSION['msg-cadastro']) && $_SESSION['msg-cadastro'] == false){
           ?>
             <div id="msg-erro" class="alert alert-danger" role="alert">
             Erro ao cadastrar consulta!
             </div>
             <br>
         <?php 
           unset($_SESSION['msg-cadastro']);
         }
     
 
         ?>  

         <h1>CONSULTA</h1>
            <form id="register-form" method="post"  action="back-end/AppController.php?acao=cadastrar-consulta" onsubmit="return valida_form()">
            <div class="half-box spacing">
                    <label for="prontuario">Prontuário</label>
                    <input type="text" name="prontuario" id="prontuario" class="data">
                </div>
                
                <div class="half-box spacing">
                    <label for="data">DATA: </label>
                    <input class="data" type="date" name="data" id="data" placeholder="Digite a data Nascimento" data-required data-min-length="8">
                </div>

            <div class="col-lg-4">
    <label for="procedimento">Novo procedimento:</label><br>
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="procedimento 1" name="procedimento[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Procedimento 1
  </label>
  </div><br>
  <div class="form-check">
  <input class="form-check-input" type="checkbox" value="procedimento 2" name="procedimento[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Procedimento 2
  </label>
</div><br>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="procedimento 3" name="procedimento[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Procedimento 3
  </label><br>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="procedimento 4" name="procedimento[]" id="flexCheckChecked" >
  <label class="form-check-label" for="flexCheckChecked">
  Procedimento 4
  </label>
</div>
</div><br><br>                   
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