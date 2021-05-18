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
		$user = $userModel->connexion();
		
		require '../views/login.php';
	}


	public function formAccount(){
		// On affiche le formulaire de création
		require '../views/create-account.php';
		
	}

	public function processAccount(){
		$userModel = new UserManager();

		if(isset($_POST['name'], $_POST['firstname'], $_POST['email']) && ($_POST['name'] != '') && ($_POST['firstname'] != '') && ($_POST['email'] != '')){

			$user = $userModel->create($_POST['name'], $_POST['firstname'], $_POST['email']);
			
			// On stock les résultats dans la superglobale $_SESSION
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['email'] = $_POST['email'];

		}
		// On affiche le profil de l'utilisateur
		require '../views/account.php';
	}
	
	public function viewAccount(){
		$userModel = new UserManager();
		$user = $userModel->read($id, $name, $firstname, $email);

		// On affiche le profil de l'utilisateur
		require '../views/account.php';
	}

	public function updateAccount(){
		$userModel = new UserManager();

		if(isset($_POST['name'], $_POST['firstname'], $_POST['email']) && ($_POST['name'] != '') && ($_POST['firstname'] != '') && ($_POST['email'] != '')){

			$result = $userModel->read($_POST['name'], $_POST['firstname'], $_POST['email']);

		}
		require '../views/update-account.php';
	}

}