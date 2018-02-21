<?php

define("DB_HOST", "localhost");
define("DB_NAME", "madeira_madeira");
define("DB_USER", "root");
define("DB_PASS", "");

class DB{

	private static $instance;

	public static function getInstance(){

		if(!isset(self::$instance)){

			try {
				self::$instance = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
				
			} catch (PDOException $e) {
				echo $e->getMessage();
			}

		}

		return self::$instance;
	}
 	
	public static function Executar($sql){
		return self::getInstance()->prepare($sql);
	}

}