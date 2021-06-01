<?php

namespace Src\Models;

/*
 * Class User
 *
 * @package Src
*/
class User{

	/*
	 * On définit des proporiété au user.
	 * Les propriétées sont des variables qui vont caractériser l'objet.
	 *
	 * Portée de la propriété private : la propriété est accessible au sein de la class en utilisant $this->variable de la propriété
	 * mais pas en dehors, on y accède à l'extérieur grâce au getter (exemple getVariable).
	 *
	 * @var $id_post int id de l'article
	 * @var $title string titre de l'article
	 * @var $introduction string introduction de l'article
	 * @var $content string contenu de l'article
	*/
	public $id_user;
	public $user_name;
	public $user_first_name;
	public $user_email;
	private $user_password;
	private $role;
	public $user_creation_date;
	private $gdpr_consent;
	public $last_visit_date;

	public function hydrate(array $datas){
		// On fait une boucle avec le tableau de données
		foreach ($datas as $key => $value) {
			$this->$key = $value;
		}
	}
	/*
	 * Pour accéder à une propriété private en dehors de la class on peut la réutiliser en dehors de la class en faisant une méthode.
	 * 
	 * Getter : permet d'accéder à une propriété private en dehors de la class pour l'afficher.
	 * Les propriétés ne sont pas altérées en dehors de la class
	 *
	*/
	public function getEmail(){
		return $this->user_email;
	}
	public function getPassword(){
		return $this->user_password;
	}
	/*
	 * Setter : permet d'accéder à une propriété private en dehors de la class et de modifier sa valeur. 
	*/
	public function setEmail($user_email){
		// On vérifie qu'il s'agit bien d'une chaine de caractère
		if(is_string($user_email)){
			$this->user_email = $user_email;
		}
	}

}