
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
if(isset($_SESSION['user'])){
    header('location: home.php');
}

?>

<header id="header">
<a id="logo" href="home.php"><img width="200" src="assets/img/logo.png" alt="logo"></a>
			       
  </header><br><br>

    <div id="main-container">
         <h1>LOGIN</h1>
            <form id="register-form" method="post"  action="back-end/AppController.php?acao=login">

                <div class="full-box">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Digite seu email" data-min-length="3">
                  </div>

                <div class="half-box spacing">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" placeholder="Digite sua senha" data-required data-min-length="8">
                </div>
                                       
                <div class="full-box">
                    <input id="btn-submit" type="submit" value="Entrar">
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