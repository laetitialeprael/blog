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
	private $id_user;
	private $user_name;
	private $user_first_name;
	private $user_email;
	private $user_password;
	private $role;
	private $user_creation_date;
	private $gdpr_consent;
	private $last_visit_date;

	public function hydrate(array $datas){
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
	public function getName(){
		return $this->user_name;
	}
	/*
	 * Setter : permet d'accéder à une propriété private en dehors de la class et de modifier sa valeur. 
	*/
	public function setTitle($user_name){
		// On vérifie qu'il s'agit bien d'une chaine de caractère
		if(is_string($user_name)){
			$this->user_name = $user_name;
		}
	}
	
	//public function getUrl(){
		//return 'index.php?page=blog/article&id=' . $this->id_post;
	//}

	//public function getExtract(){
		//if (empty($this->introduction)){
            //$html = '<p>' . substr($this->content, 0, 150) . '...</p>';
        //}else{
            //$html = '<p>' . substr($this->introduction, 0, 150) . '...</p>';
        //}
		//$html .= '<a href="' . $this->getUrl() . '">Lire la suite</a>';
		//return $html;
	//}

}