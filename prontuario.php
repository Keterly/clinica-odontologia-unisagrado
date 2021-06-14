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
$acao = 'prontuario';
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
   
	<div class="container col-md-8 ">
    <h1 class="text-center">PRONTUÁRIO</h1>
         <?php 
      
         if(isset($_SESSION['msg-excluir']) && $_SESSION['msg-excluir'] == true){
          ?>
        <div class="msg-success alert alert-success">"Dados excluidos com sucesso!</div>
        <?php 
          unset($_SESSION['msg-excluir']);
        }

        ?>
       
			<table>		
                <tr>
                        <th>Paciente</th>
                        <th>Nº Prontuário</th>
                        <th>Data Consulta</th>
                        <th>Procedimentos</th>
                      </tr>
                <?php 
                    if(!empty($result)){
                    foreach ($result as $user) {
                      ?>
                      <tr>
                      <td height="100"><input type="text" name="" id="" value="<?php echo $user->nome; ?>" readonly></td>
                        <td height="100"><input type="text" name="" id="" value="<?php echo $user->prontuario; ?>" readonly></td>
                        <td height="100"><input type="date" name="" id="" value="<?php echo $user->data_consulta; ?>" readonly></td>
                        <td height="100"><textarea name="" id="text-area-pront" cols="2" rows="5" placeholder="Procedimentos" readonly><?php echo $user->procedimento; ?></textarea></td>
                    </tr> 
                <?php           
                    }
                }
                ?>			
						
				</table><br><br>  
        <div class="full-box">
                    <a class="btn btn-success"  href="home.php" id="btn-voltar">Voltar</a>
                    <a class="btn btn-danger" href="back-end/AppController.php?acao=excluir-prontuario&prontuario=<?php echo $user->prontuario ?>">Exluir </a>
        </div>  
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