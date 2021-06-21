<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;

require '../public/config.php';

use Swift_SmtpTransport;
use Swift_Mailer;
use Swift_Message;

/*
 * Class UserController
 *
 * @package Src
*/
class UserController extends Controller{

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
	public function viewAccount()
	{
		$userModel = new UserManager();

		if($user = $this->isValid($_POST)){

			//Si les champs mot de passe correspond
			if($user['password'] === $user['validpassword']){
				
				//On lance la méthode de création de l'utilisateur en hachant le mot de passe
				$user = $userModel->create($user['name'], $user['firstname'], $user['email'], password_hash($user['password'], PASSWORD_DEFAULT));
				
				//On redirige l'utilisateur sur la page de connexion
				header('Location: /blog/connexion');
			
			//Si les mot de passe sont différents
			}else{
				echo 'Les mots de passe sont différents';
			}
		}
		//On affiche le formulaire de création
		require '../views/create-account.php';
		
	}

	/*
	 * Méthode de connexion de l'utilisateur
	*/
	public function viewLogin()
	{
		$userModel = new UserManager();

		if(isset($_POST['email'], $_POST['password']) && ($_POST['email'] != '' && $_POST['password'] !='')) {
			
			// Si l'adresse mail de l'utilisateur est enregistrée
			if($user = $userModel->connexion($_POST['email'])){
				
				$password = $user->getPassword();

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
				// Sinon on affiche le message d'erreur
				else{
					$_SESSION['message'] = "Oops ! Le mot de passe n'est pas correcte.";
				}
			}
			// Si l'adresse mail de l'utilisateur n'est pas enregistrée
			else{
				$_SESSION['message'] = "Oops ! L'adresse mail n'est pas enregistrée.";
			}		
		}

		require '../views/login.php';
	}
	
	/*
	 * Méthode pour envoyer le lien de réinitialisation du mot de passe
	 * Swiftmailer : https://swiftmailer.symfony.com/docs/sending.html
	*/
	public function viewRequestPassword()
	{

		$userModel = new UserManager();

		if(isset($_POST['email']) && ($_POST['email'] != '')) {

			// Si l'adresse mail de l'utilisateur est enregistrée
			if($user = $userModel->connexion($_POST['email'])){

				//On crée un token avec l'adresse mail de l'utilisateur
				$token = base64_encode($_POST['email']);
				$url = 'http://localhost:8888/blog/nouveau-mot-de-passe/'.$token;

				$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
	  				->setUsername(YOUR_GMAIL_MAIL)
	  				->setPassword(YOUR_GMAIL_PASSWORD)
				;

				$mailer = new Swift_Mailer($transport);

				$message = (new Swift_Message('Réinitilatisation de votre mot de passe'))
	  				->setFrom([YOUR_GMAIL_MAIL => 'OpenclassroomsBlog'])
	  				->setTo([$_POST['email']])
	  				->setBody('Voici le lien de réinitialisation de votre mot de passe : '.$url)
	  			;

	  			$result = $mailer->send($message);

	  			//Si le mail est envoyé
	  			if(mail($_POST['email'], 'Réinitilatisation de votre mot de passe', 'Voici le lien de réinitialisation de votre mot de passe :' .$url)){
	  					//On affiche le message
	  					$_SESSION['message-valid'] = "Un lien de réinitilisation vient de vous être envoyer par mail.";
	  			}

			}
			//Sinon on affiche le message
			else{
				$_SESSION['message-error'] = "Oops ! Aucune adresse mail est enregistrée.";
			}
		}

		require '../views/form-forgot-password.php';
	}

	/*
	 * Méthode pour réinitiliser le mot de passe de l'utilisateur
	*/
	public function viewUpdatePassword($params)
	{
		$userModel = new UserManager();

		//On vérifie que les champs sont remplis
		if(isset($_POST['password'], $_POST['validpassword']) && ($_POST['password'] != '' && $_POST['validpassword'] !='')){
			
			//On vérifie que les champs password et validpassword sont identiques
			if($_POST['password'] === $_POST['validpassword']){
				//On lance la méthode
				$user = $userModel->updatePassword(password_hash($_POST['password'], PASSWORD_DEFAULT), base64_decode($params['token']));
				
				//On redirige l'utilisateur sur le formulaire de connexion
				header('Location: /blog/connexion');

			}else{
				//Sinon on affiche le message d'erreur
				$_SESSION['message'] = "Oops ! Le nouveau mot de passe et la confirmation du mot de passe ne sont pas identiques";
			}
		}
		require '../views/form-password.php';
	}
}