<?php

namespace Src\Controllers;

use Src\Models\UserManager;

/*
 * Class UserController
 *
 * @package Src
*/
class UserController extends Controller{

	public function login(){
		$userModel = new UserManager();

		if(isset($_POST['email'], $_POST['password']) && ($_POST['email'] != '' && $_POST['password'] !='')) {
			
			$user = $userModel->connexion($_POST['email'], $_POST['password']);
			var_dump($user);

			if(password_verify($_POST['password'], $user->user_password)){
				echo 'Mot de passe correcte';
			}else{
				echo 'Mot de pass incorrecte';
			}
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
			
			// On stock les résultats dans la superglobale $_SESSION
			//$_SESSION['name'] = $_POST['name'];
			//$_SESSION['firstname'] = $_POST['firstname'];
			//$_SESSION['email'] = $_POST['email'];
		}
		// On affiche le formulaire de création
		require '../views/create-account.php';
		
	}

	public function viewAccount(){
		//$this->isAuth();
		//$userModel = new UserManager();
		//$user = $userModel->read();
		// On affiche le profil de l'utilisateur
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