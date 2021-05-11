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
	private $category_id_category;
	private $user_id_user;

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
	public function getTitle(){
		return $this->title;
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