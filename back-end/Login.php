<?php

require 'Connection.php';

class Login{

	public function __construct(){

	}
	public function login($email, $senha){
		$stmt = Connection::getInstance()->prepare("SELECT * FROM funcionarios WHERE email = :email AND senha = :senha");
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':senha', $senha);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_OBJ);
		
		if($result){
			session_start();
			$_SESSION['user'] = $result->nome;
			header('location: ../home.php');
		}
		else{
			header('location: ../login.php');
		}
	}

	public function logout(){
		session_start();
		unset($_SESSION['user']);
		header('location: ../login.php');
		
	}


}