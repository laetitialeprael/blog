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
	//	$userModel = new UserManager();

	//	if(isset($_POST['email'], $_POST['password']) && ($_POST['email'] != '' && $_POST['password'] !='')) {
	//		$user = $userModel->connexion($_POST['email'], $_POST['password']);
			// Si l'adresse mail est le mot de passe sont correct
	//		if($user = ){
	//			header('Location: /blog/mon-compte');
	//		}
			// Si le mot de passe est différent
	//		elseif($user != $_POST['password']){
	//			echo 'Le mot de passe est incorrect';
	//		}
			// Si l'adresse mail est différente
	//		elseif($user != $_POST['email']){
	//			echo 'Adresse mail inconnue';
	//		}	
			// Si l'adresse mail est le mot de passe sont incorrectes
	//	}
		
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

			// On vérifie la saisie des mot de passe
			if($user['password'] === $user['validpassword']){
				$user = $userModel->create($user['name'], $user['firstname'], $user['email'], password_hash($user['password'], PASSWORD_DEFAULT));
				header('Location: /blog/connexion');
			
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