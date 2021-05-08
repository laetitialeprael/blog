<?php

namespace Src\Controllers;

use Src\Models\PostManager;

/*
 * Class PostController
 *
 * @package Src
*/
class PostController {

	public static function viewLast(){
		// Appel à la méthode du model qui affiche les 3 derniers post
		$postModel = new PostManager;
		$postModel->showLast();
		require '../views/home.php';
	}

	public static function viewList(){
		echo 'On montre tous les articles';
		// Appelle à la méthode du model qui affiche la liste des articles
		require '../views/archive.php';
	}

	public static function viewSingle(){
		echo 'On montre un seul article';
		// Appelle à la méthode qui affiche l'article en fonction de son id
		require '../views/single-post.php';
	}

	// Méthode pour afficher la page de création d'un article
	public static function adminCreate(){
		require '../views/admin/create-post.php';
	}
	// Méthode pour afficher un article (viewSingle ?)

	// Méthode pour mettre à jour un article
	public static function adminUpdate(){
		require '../views/admin/update-post.php';
	}
	
	// Méthode pour supprimer un article
	public static function adminDelete(){
		require '../views/admin/delete-post.php';
	}

}