<?php 


class Connection{
	
	const HOST = "localhost";
	const DBNAME = "odontologia_unisagrado";
	const PASS = "";
	const USER = "root";

	private static $instance;


	public static function getInstance(){

		if(empty(self::$instance)){
			try{
				self::$instance = new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USER, self::PASS);
			}

			catch(Exception $e){
				echo $e->getMessage();
			}
		}
		return self::$instance;
	}

}