<?php

namespace Src\Controllers;

use Src\Models\PostManager;
use Src\Models\UserManager;

/*
 * Class PostController
 *
 * @package Src
*/
class PostController extends Controller{

	/*
	 * La méthode devra être déplacer dans la class UserController
	*/
	public function login(){
		$userModel = new UserManager();
		$user = $userModel->connexion();
		
		require '../views/login.php';
	}

	public function viewLast(){
		// Appel à la méthode du model qui affiche les 3 derniers post
		$postModel = new PostManager();
		$result = $postModel->showLast();
	
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