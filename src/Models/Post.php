<?php

namespace Src\Models;

/*
 * Class Post
 *
 * @package Src
*/
class Post{

	/*
	 * On définit des proporiété au post.
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
	private $id_post;
	private $title;
	private $introduction;
	private $content;
	private $image;
	private $state;
	private $post_creation_date;
	private $slug;
	private $post_date_update;
	private $post_date_published;
	private $id_category;
	private $category_name;
	private $user_id_user;
	private $user_name;
	private $user_first_name;

	public function hydrate(array $datas){
		foreach ($datas as $key => $value) {
			$this->$key = $value;
		}
	}

	/*
	 * @return l'identifiant de l'article sous forme de chaine de caractère
	*/
	public function getId(){
		return $this->id_post;
	}
	/*
	 * @return le titre de l'article sous forme de chaine de caractère
	*/
	public function getTitle(){
		return $this->title;
	}
	/*
	 * @return le texte d'introduction de l'article sous forme de chaine de caractère
	*/
	public function getIntroduction(){
		return $this->introduction;
	}
	/*
	 * @return le contenu de l'article sous forme de chaine de caractère
	*/
	public function getContent(){
		return $this->content;
	}
	/*
	 * @return le statut de l'article sous forme de chaine de caractère
	*/
	public function getSate(){
		return $this->state;
	}
	/*
	 * @return la date de création de l'article sous forme de chaine de caractère
	*/
	public function getCreationDate(){
		return $this->post_creation_date;
	}
	/*
	 * @return le slug de l'article sous forme de chaine de caractère
	*/
	public function getSlug(){
		return $this->slug;
	}
	/*
	 * @return l'id de la catégorie de l'article sous forme de chaine de caractère
	*/
	public function getIdCategory(){
		return $this->id_category;
	}
	/*
	 * @return la catégorie de l'article sous forme de chaine de caractère
	*/
	public function getCategory(){
		return $this->category_name;
	}
	/*
	 * @return le nom de l'utilisateur sous forme de chaine de caractère
	*/
	public function getName(){
		// Modifier la méthode pour faire afficher la première lettre du nom de famille suivit d'un point.
		return $this->user_name;
	}
	/*
	 * @return le prénom de l'utilisateur sous forme de chaine de caractère
	*/
	public function getFirstName(){
		return $this->user_first_name;
	}
	/*
	 * Méthode qui permet d'afficher un extrait de l'article
	 * @return un extrait de l'article sous forme de chaine de caractère
	*/
	public function viewExtract(){
		// Si le texte d'introduction est vide
		if(empty($this->getIntroduction())){
			// On affiche un extrait du contenu
			$html = substr($this->getContent(), 0, 150) . '...';
		}
		else{
			// Sinon on affiche un extrait du text d'introduction
			$html = substr($this->getIntroduction(), 0, 150) . '...';
		}
		return $html;
	}
	/*
	 * Méthode qui permet d'afficher le prénom et la première lettre du nom de l'auteur de l'article
	 * @return l'auteur de l'article sous forme de chaine de caractère
	*/
	public function viewAuthor(){
		$html = substr($this->getName(), 0, 1) . '. ' . $this->getFirstName();
		return $html;
	}
	/*
	 * Méthode qui permet de générer l'url des articles
	 * @return l'url de l'article sous forme de chaine de caractère
	*/
	public function viewUrl(){
		$url = $this->getSlug() . '-' . $this->getId();
		return $url;
	}
	/*
	 * Méthode qui permet d'afficher le statut des articles
	 * @return le statut de l'article sous forme de chaine de caractère
	*/
	public function viewState(){
		if($this->getSate() == 0){
			echo ('Corbeille');
		}elseif($this->getSate() == 1){
			echo ('En cours de modification');
		}elseif($this->getSate() == 2){
			echo ('En attente de validation');
		}else{
			echo ('Publié');
		}
		//return $html;
	}
	
	/*
	 * Méthode qui permet de générer le slug d'un article
	 * @return le slug sous forme de chaine de caractère
	*/
	public static function viewSlug($string, $delimiter = '-'){
		$oldLocale = setlocale(LC_ALL, '0');
		setlocale(LC_ALL, 'en_US.UTF-8');
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower($clean);
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
		$clean = trim($clean, $delimiter);
		setlocale(LC_ALL, $oldLocale);
		return $clean;
	}

	/*
	 * Setter : permet d'accéder à une propriété private en dehors de la class et de modifier sa valeur. 
	*/
	public function setTitle($title){
		// On vérifie qu'il s'agit bien d'une chaine de caractère
		if(is_string($title)){
			$this->title = $title;
		}
	}
}