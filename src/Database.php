<?php

namespace Src;

use \PDO;

/*
 * Class Database
 * Permet de se connecter à la base de donnée
 *
 * @package Src
*/
class Database{

	/*
	 * @var $db_name string contient le nom de la base de donnée
	 * @var $db_user string contient le nom d'utilisateur de la base de donnée
	 * @var $db_password string contient le mot de passe de la base de donnée
	 * @var $db_host string contient le nom du serveur de la base de donnée
	 * @var $pdo contient le dsn vers la base de donnée
	*/
	private $db_name;
	private $db_user;
	private $db_password;
	private $db_host;
	private $pdo;
	
	/*
	 * @param $string string
	 * @return ce que la méthode (function) retourne
	*/
	public function __construct($db_name, $db_user='root', $db_password='root', $db_host='localhost'){
		$this->db_name = $db_name;
		$this->db_user = $db_user;
		$this->db_password = $db_password;
		$this->db_host = $db_host;
	}

	/*
	 * Getter : permet d'accéder à une propriété private en dehors de la class pour l'afficher.
	 * Les propriétés ne sont pas altérées en dehors de la class.
	 *
	 * @return $pdo
	*/
	private function getPDO(){
		if($this->pdo === null){
			$pdo = new PDO('mysql:dbname=openclassroomsblog;host=localhost', "root", "root");
			// Afficher les erreurs sql
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->pdo = $pdo;
		}
		return $this->pdo;
	}

	/*
	 * Méthode qui permet de récupérer les résultats de query, à la fin nous devrions avoir seulement du prepare
	 *
	 * @param $statement permet de stocker la requête Sql
	 * @param $class_name permet de stocker le nom de la classe a charger
	 * @return $datas
	*/
	public function query($statement, $class_name){
		$req = $this->getPDO()->query($statement);
		$datas = $req->fetchAll(PDO::FETCH_CLASS, $class_name);
		return $datas;
	}

	/*
	 * @param $statement permet de stocker la requête Sql
	 * @param $attributes permet de stocker l'attribut
	 * @param $class_name permet de stocker le nom de la classe a charger
	 * @param $one permet d'afficher la méthode fetch() si $one vaut true ou fetchAll() si $one vaut false
	 * @return $datas
	*/
	public function prepare($statement, $attributes, $class_name, $one = false){
		$req = $this->getPDO()->prepare($statement);
		$req->execute($attributes);
		$req->setFetchMode(PDO::FETCH_CLASS, $class_name);
		// Si on attend 1 seul résultat on fetch
		if ($one){
			$datas = $req->fetch();
		} else {
			// Si on doit retourner plusiseurs résultat on fetchAll
			$datas = $req->fetchAll();
		}
		return $datas;
	}
}