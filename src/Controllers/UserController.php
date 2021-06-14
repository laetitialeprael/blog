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
				$password = $user->getPassword();
				//var_dump();die;

				// Si le mot de passe saisie par l'utilisateur est enregistré
				if(password_verify($_POST['password'], $password)){
					// On enregistre les variables de la table user dans $_SESSION
					$_SESSION['user']['name'] = $user->getName();
					$_SESSION['user']['firstname'] = $user->getFirstName();
					$_SESSION['user']['email'] = $user->getEmail();
					$_SESSION['user']['creationDate'] = $user->getCreationDate();
					$_SESSION['user']['iduser'] = $user->getId();


					// On redirige l'utilisateur sur son profil
					header('Location: /blog/admin/mon-compte');
				}
				// Sinon
				else{
					$_SESSION['message'] = "Le mot de passe n'est pas correcte";
					//var_dump($user);
				}
			}
			// Si l'adresse mail de l'utilisateur n'est pas enregistrée
			else{
				echo "L'adresse mail n'est pas enregistrée";
			}		
		}

		require '../views/login.php';
	}


	/*
	 * Méthode pour vérifier que les champs du formulaire ne sont pas vides
	*/
	public function isValid($data = [])
	{
		if(isset($data['name'], $data['firstname'], $data['email'], $data['password'], $data['validpassword']) && ($data['name'] != '') && ($data['firstname'] != '') && ($data['email'] != '' && $data['password'] !='' && $data['validpassword'] !='')) {
			return $data;
		}

		return false;
	}
	/*
	 * Méthode pour la création du compte d'un utilisateur
	*/
	public function formAccount(){
		$userModel = new UserManager();

		if($user = $this->isValid($_POST)){

			// Si les champs mot de passe correspond
			if($user['password'] === $user['validpassword']){
				// On lance la méthode de création de l'utilisateur en hachant le mot de passe
				$user = $userModel->create($user['name'], $user['firstname'], $user['email'], password_hash($user['password'], PASSWORD_DEFAULT));
				// On redirige l'utilisateur sur la page de connexion
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
		require '../views/admin/account.php';

	}
	/*
	 * Méthode pour réinitiliser le mot de passe de l'utilisateur
	*/
	public function updateAccount(){
		$this->isAuth();

		$userModel = new UserManager();

		if(isset($_POST['email'], $_POST['password']) && ($_POST['email'] != '' && $_POST['password'] !='')) {
			if($_POST['password'] === $_POST['validpassword']){

				$user = $userModel->update(password_hash($_POST['password'], PASSWORD_DEFAULT),$_SESSION['iduser']);
			}
		}

		require '../views/form-password.php';
	}
	/*
	 * Méthode pour déconnecter l'utilisateur
	*/
	public function logout()
	{
		session_destroy();
		header('Location: /blog/');
	}
}