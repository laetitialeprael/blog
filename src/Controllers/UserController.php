<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;

/*
 * Class UserController
 *
 * @package Src
*/
class UserController extends Controller{

	public function login(){
		$userModel = new UserManager();
		//$userGetter = new User();

		if(isset($_POST['email'], $_POST['password']) && ($_POST['email'] != '' && $_POST['password'] !='')) {
			
			if($user = $userModel->connexion($_POST['email'], $_POST['password'])){
				echo 'Ok on passe à la suite';
				if($_POST['password'] === $user->user_password){
					echo 'le mot de passe est correcte';
					var_dump($user);
				}else{
					echo 'le mot de passe ne convient pas';
				}
			}
			//var_dump($user);
			// Si les données ne sont pas enregistrées on a le message d'alerte
			// Fatal error: Uncaught TypeError: Argument 1 passed to Src\Models\User::hydrate() must be of the type array, bool given, called in /Applications/MAMP/htdocs/blog/src/Models/UserManager.php on line 50 and defined in /Applications/MAMP/htdocs/blog/src/Models/User.php:34 Stack trace: #0 /Applications/MAMP/htdocs/blog/src/Models/UserManager.php(50): Src\Models\User->hydrate(false) #1 /Applications/MAMP/htdocs/blog/src/Controllers/UserController.php(21): Src\Models\UserManager->connexion('ccdscs@kj.fr', 'test') #2 /Applications/MAMP/htdocs/blog/public/index.php(60): Src\Controllers\UserController->login(Array) #3 {main} thrown in /Applications/MAMP/htdocs/blog/src/Models/User.php on line 34

			//if($_POST['password'] === $user->user_password){
			//	echo 'le mot de passe est correcte';
			//}else{
			//	echo 'le mot de passe ne convient pas';
			//}

			//$email = $userGetter->getPassword();
			//var_dump($email);

			// $user->user_password
			//if(password_verify($_POST['password'], $user->user_password)){
			//	echo 'Mot de passe correcte';
			//}else{
			//	echo 'Mot de pass incorrecte';
			//}
		} else {
			echo 'Une erreur s\'est produit';
		}
		
		require '../views/login.php';
	}


	public function isValid($data = []) {
		if(isset($data['name'], $data['firstname'], $data['email'], $data['password'], $data['validpassword']) && ($data['name'] != '') && ($data['firstname'] != '') && ($data['email'] != '' && $data['password'] !='' && $data['validpassword'] !='')) {
			return $data;
		}

		return false;
	}

	public function formAccount(){
		$userModel = new UserManager();

		if($user = $this->isValid($_POST)){

			// Si les champs mot de passe correspond
			if($user['password'] === $user['validpassword']){
				// On lance la méthode de création de l'utilisateur en hachant le mot de passe
				$user = $userModel->create($user['name'], $user['firstname'], $user['email'], password_hash($user['password'], PASSWORD_DEFAULT));
				// On redirige l'utilistaur sur la page de connexion
				header('Location: /blog/connexion');
			
			// Si les mot de passe sont différents
			}else{
				echo 'Les mots de passe sont différents';
			}
		}
		// On affiche le formulaire de création
		require '../views/create-account.php';
		
	}

	public function viewAccount(){
		require '../views/account.php';

	}

	public function updateAccount(){
		$userModel = new UserManager();
		
		if($user = $this->isValid($_POST)){

			$result = $userModel->read($_POST['name'], $_POST['firstname'], $_POST['email']);

		}
		require '../views/update-account.php';
	}

}