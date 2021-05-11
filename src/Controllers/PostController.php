<?php

namespace Src\Controllers;

use Src\Models\PostManager;


/*
 * Class PostController
 *
 * @package Src
*/
class PostController extends Controller{

	public function viewLast(){
		// Appel à la méthode du model qui affiche les 3 derniers post
		$postModel = new PostManager();
		$result = $postModel->showLast();
		//var_dump($result);
		/*
		 * $db = $this->getDatabase();
		 * Fatal error: Uncaught Error: Using $this when not in object context in /Applications/MAMP/htdocs/blog/src/Controllers/PostController.php:42 Stack trace: #0 /Applications/MAMP/htdocs/blog/public/index.php(46): Src\Controllers\PostController::viewLast(Array) #1 {main} thrown in /Applications/MAMP/htdocs/blog/src/Controllers/PostController.php on line 42
		*/
		//$db = self::getDatabase();
		//$result = $db->query('SELECT * FROM post');
		
		require '../views/home.php';
	}

	public function viewList(){
		echo 'On montre tous les articles';
		// Appelle à la méthode du model qui affiche la liste des articles
		require '../views/archive.php';
	}

	public function viewSingle(){
		echo 'On montre un seul article';
		// Appelle à la méthode qui affiche l'article en fonction de son id
		require '../views/single-post.php';
	}

	// Méthode pour afficher la page de création d'un article
	public function adminCreate(){
		$postModel = new PostManager();		
		$result = $postModel->create();
		var_dump($result);
		require '../views/admin/create-post.php';
	}


	// Méthode pour afficher un article (viewSingle ?)

	// Méthode pour mettre à jour un article
	public function adminUpdate(){
		require '../views/admin/update-post.php';
	}
	
	// Méthode pour supprimer un article
	public function adminDelete(){
		require '../views/admin/delete-post.php';
	}

}