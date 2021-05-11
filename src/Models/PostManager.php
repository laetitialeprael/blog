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
		// trqnsfor le retour en class Post()
		$posts = [];
		foreach ($results as $result) {
			$post = new Post();
			$post->hydrate($result);
			$posts[] = $post;
		}
		return $posts;
		//var_dump($result);
	}

	public function create($name, $firstname, $email){
		if(isset($_POST['name'], $_POST['firstname'], $_POST['email']) && ($_POST['name'] != '') && ($_POST['firstname'] != '') && ($_POST['email'] != '')){

			$db = $this->getDatabase();
			//$result = $db->prepare('SELECT * FROM post WHERE id_post = ?', [$_GET['id_post']], true);
			$result = $db->prepare('INSERT INTO user (user_name, user_first_name, user_email) VALUES (:user_name, :user_first_name, :user_email)', array(':user_name' => $name,':user_first_name' => $firstname,':user_email' => $email), true);
		} else {
			echo ('Rien ne se passe');
		}
	}

}