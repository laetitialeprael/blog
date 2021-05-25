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

		if(isset($_POST['email'], $_POST['password']) && ($_POST['email'] != '' && $_POST['password'] !='')) {
			
			// Si l'adresse mail de l'utilisateur est enregistrée
			if($user = $userModel->connexion($_POST['email'])){
				// On devrait pouvoir accéder à la donnée avec un getter
				// La visibilité de $user_password est modifié à public User.php
				$password = $user->user_password;

				// Si le mot de passe saisie par l'utilisateur
				if(password_verify($_POST['password'], $password)){
					// On enregistre les variables de la table user dans $_SESSION
					$_SESSION['name'] = $user->user_name;
					$_SESSION['firstname'] = $user->user_first_name;
					$_SESSION['email'] = $user->user_email;
					$_SESSION['creationDate'] = $user->user_creation_date;
					$_SESSION['lastVisit'] = $user->last_visit_date;
					// On redirige l'utilisateur sur son profil
					header('Location: /blog/mon-compte');
				}
				// Sinon
				else{
					echo "Le mot de passe n'est pas correcte";
				}
			}
			// Si l'adresse mail de l'utilisateur n'est pas enregistrée
			else{
				echo "L'adresse mail n'est pas enregistrée";
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