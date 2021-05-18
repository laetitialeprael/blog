<?php
/*
 * Créer la class global Manager qui se chargera de se connecter à la db
 * Vérifier si c'est le controller ou le model qui se connecte.
*/
namespace Src\Models;

use Src\Database;
/*
 * Class UserManager
 *
 * @package Src
*/
class UserManager extends Manager{

	public function create($name, $firstname, $email){

		$db = $this->getDatabase();
		$user = $db->insert(
		//$statement
		'INSERT INTO user (user_name, user_first_name, user_email) VALUES (:user_name, :user_first_name, :user_email)',
		//$attributes
		array(':user_name' => $name,':user_first_name' => $firstname,':user_email' => $email));
	}
	public function read($id, $name, $firstname, $email){

		$db = $this->getDatabase();
		$user = $db->prepare('SELECT * FROM user', array(':id_user' => $id, ':user_name' => $name,':user_first_name' => $firstname,':user_email' => $email), true);
		return $user;
	}

	public function update($name, $firstname, $email){
		$db = $this->getDatabase();
		$user = $db->insert(
		//$statement
		'UPDATE user  SET user_name = :user_name, user_first_name = :user_first_name, user_email = user_email',
		//$attributes
		array(':user_name' => $name,':user_first_name' => $firstname,':user_email' => $email));
	}
	public function delete(){}
	
	public function connexion(){}

}