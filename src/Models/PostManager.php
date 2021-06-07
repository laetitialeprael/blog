<?php
/*
 * Créer la class global Manager qui se chargera de se connecter à la db
 * Vérifier si c'est le controller ou le model qui se connecte.
*/
namespace Src\Models;

use Src\Database;
/*
 * Class PostManager
 *
 * @package Src
*/
class PostManager extends Manager{

	public function showLast(){
		//echo 'on y est presque';
		$db = $this->getDatabase();
		$results = $db->query('SELECT * FROM post');
		// transforme le retour en class Post()
		$posts = [];
		foreach ($results as $result) {
			$post = new Post();
			$post->hydrate($result);
			$posts[] = $post;
		}
		return $posts;
		//var_dump($result);
	}
	
	public function create($title, $introduction, $content, $category, $user){
		$db = $this->getDatabase();
		$results = $db->insert(
		//$statement
		'INSERT INTO post (title, introduction, content, category_id_category, user_id_user) VALUES (:title, :introduction, :content, :category_id_category, :user_id_user)',
		//$attributes
		array(':title' => $title,':introduction' => $introduction,':content' => $content, ':category_id_category' => $category, ':user_id_user' => $user));

		if($results){
			$post = new Post();
			$post->hydrate($results);
			return $post;
		}
		return false;
	}

}