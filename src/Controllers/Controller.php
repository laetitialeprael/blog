<?php

namespace Src\Controllers;

use Src\Database;

/*
 * Class Controller
 *
 * @package Src
*/
class Controller{

	const DB_NAME = 'openclassroomsblog';
	const DB_USER = 'root';
	const DB_PASS = 'root';
	const DB_HOST = 'localhost';


	private static $database;

	public function getDatabase(){

		if(self::$database === null){
			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}
		return self::$database;

	}
	public function isAuth(){
		if(!isset($_SESSION['email'])){
			header('Location: /blog/connexion');
		}
	}
}