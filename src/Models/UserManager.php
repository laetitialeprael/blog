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

	public function create(){
		echo 'Créer un compte';
	}
	public function update(){}
	public function delete(){}
	public function connexion(){
		echo 'Hello';
	}

}