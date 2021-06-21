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
	
	/*
	 * Méthode pour créer un article
	 * @return string
	*/
	public function create($title, $introduction, $content, $slug, $category, $user)
	{
		$db = $this->getDatabase();
		$results = $db->insert(
		//$statement
		'INSERT INTO post (title, introduction, content, slug, category_id_category, user_id_user) VALUES (:title, :introduction, :content, :slug, :category_id_category, :user_id_user)',
		//$attributes
		array(':title' => $title, ':introduction' => $introduction, ':content' => $content, ':slug' => $slug, ':category_id_category' => $category, ':user_id_user' => $user));

		if($results){
			$post = new Post();
			$post->hydrate($results);
			return $post;
		}
		return false;
	}

	/*
	 * Méthode pour mettre à jour un article
	 * @return string
	*/
	public function update($title, $introduction, $content, $slug, $category, $idpost)
	{
		$db = $this->getDatabase();
		$post = $db->insert(
		//$statement
		"UPDATE post SET title = :title, introduction = :introduction, content = :content, slug = :slug, category_id_category = :category WHERE post.id_post = :id_post",
		//$attributes
		array(':title' => $title, ':introduction' => $introduction, ':content' => $content, ':slug' => $slug, ':category' => $category, 'id_post' => $idpost));
	}

	/*
	 * Méthode pour afficher tous les articles du blog
	 * @return string
	*/
	public function readAll()
	{
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

	/*
	 * Méthode pour afficher les 3 derniers articles du blog
	 * @return string
	*/
	public function readLast()
	{
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

	/*
	 * Méthode pour afficher un article
	 * @return string
	*/
	public function read($slug,$idpost)
	{
		$db = $this->getDatabase();
		$results = $db->prepare(
			'SELECT post.id_post, post.title, post.introduction, post.content, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE post.id_post = :id_post AND post.slug = :slug',
			array(':id_post' => $idpost, ':slug' => $slug), true);
		
		if($results){
			$post = new Post();
			$post->hydrate($results);
			return $post;
		}
		return false;
	}
	
	/*
	 * Méthode pour afficher les articles écrit par un utilisateur connecté à son profil
	 * @return string
	*/
	public function readUserPost($iduserpost)
	{
		$db = $this->getDatabase();
		$results = $db->prepare(
			'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE post.user_id_user = :user_id_user ORDER BY post.post_creation_date DESC',
			array(':user_id_user' => $iduserpost));
		
		$posts = [];
		foreach ($results as $result) {
			$post = new Post();
			$post->hydrate($result);
			$posts[] = $post;
		}
		return $posts;
	}

	/*
	 * Méthode pour afficher les catégories d'article
	*/
	public function readCategories(){
		$db = $this->getDatabase();
		$results = $db->query(
			'SELECT * FROM category ORDER BY category.id_category DESC');

		$categories = [];
		foreach ($results as $result) {
			$category = new Post();
			$category->hydrate($result);
			$categories[] = $category;
		}
		return $categories;
	}

	/*
	 * Méthode pour compter le nombre d'article sur le statut 'corbeille'
	 * @return int
	*/
	public function countPostDraft($iduserpost)
	{
		$db = $this->getDatabase();
		$results = $db->prepare(
			'SELECT COUNT(*) AS draft from post WHERE post.state = "0" AND post.user_id_user = :user_id_user',
			array(':user_id_user' => $iduserpost), true);

		return $results;
	}

	/*
	 * Méthode pour compter le nombre d'article sur le statut 'en attente de validation'
	 * @return int
	*/
	public function countPostPendingValidation($iduserpost)
	{
		$db = $this->getDatabase();
		$results = $db->prepare(
			'SELECT COUNT(*) AS pending from post WHERE post.state = "2" AND post.user_id_user = :user_id_user',
			array(':user_id_user' => $iduserpost), true);

		return $results;
	}
	
	/*
	 * Méthode pour compter le nombre d'article sur le statut 'publié'
	 * @return int
	*/
	public function countPostPublished($iduserpost)
	{
		$db = $this->getDatabase();
		$results = $db->prepare(
			'SELECT COUNT(*) AS published from post WHERE post.state = "1" AND post.user_id_user = :user_id_user',
			array(':user_id_user' => $iduserpost), true);

		return $results;
	}

}