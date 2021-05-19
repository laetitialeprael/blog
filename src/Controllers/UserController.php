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
			//$email = $_POST['email'];
			//$password = $_POST['password'];
			//$user = $userModel->connexion($email, $password);
			if($user = $userModel->connexion($_POST['password'])){
				//echo 'Le mot de passe est correcte';
				header('Location: /blog/mon-compte');
			}
			//$_SESSION['email'] = $_POST['email'];
			//$_SESSION['password'] = $_POST['password'];

			//
			
			//var_dump($user);
		}
		
		require '../views/login.php';
	}


	public function isValid($data = []) {
		if(isset($data['name'], $data['firstname'], $data['email'], $data['password']) && ($data['name'] != '') && ($data['firstname'] != '') && ($data['email'] != '' && $data['password'] !='')) {
			return $data;
		}

		return false;
	}

	public function formAccount(){
		$userModel = new UserManager();

		if($user = $this->isValid($_POST)){

			$user = $userModel->create($user['name'], $user['firstname'], $user['email'], $user['password']);
			
			// On stock les résultats dans la superglobale $_SESSION
			//$_SESSION['name'] = $_POST['name'];
			//$_SESSION['firstname'] = $_POST['firstname'];
			//$_SESSION['email'] = $_POST['email'];
			header('Location: /blog/connexion');
		}
		// On affiche le formulaire de création
		require '../views/create-account.php';
		
	}

	public function viewAccount(){
		//$this->isAuth();
		//$userModel = new UserManager();
		//$user = $userModel->read($id);
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