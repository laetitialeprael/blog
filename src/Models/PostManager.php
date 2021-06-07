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

	public function readAll(){
		$db = $this->getDatabase();
		$results = $db->query('SELECT post.id_post, post.title, post.introduction, post.content, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category ORDER BY post.post_creation_date DESC');
		// transforme le retour en class Post()
		$posts = [];
		foreach ($results as $result) {
			$post = new Post();
			$post->hydrate($result);
			$posts[] = $post;
		}
		return $posts;
	}

	public function readLast(){
		$db = $this->getDatabase();
		$results = $db->query('SELECT post.id_post, post.title, post.introduction, post.content, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category ORDER BY post.post_creation_date DESC LIMIT 3');
		// transforme le retour en class Post()
		$posts = [];
		foreach ($results as $result) {
			$post = new Post();
			$post->hydrate($result);
			$posts[] = $post;
		}
		return $posts;
	}

	public function read($idpost){
		$db = $this->getDatabase();
		$results = $db->prepare(
			'SELECT * from post WHERE post.id_post = :id_post',
			array(':id_post' => $idpost), true);
		
		if($results){
			$post = new Post();
			$post->hydrate($results);
			return $post;
		}
		return false;
	}

}