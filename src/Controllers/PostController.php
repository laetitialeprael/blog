<?php

namespace Src\Controllers;

use Src\Models\PostManager;
use Src\Models\Post;

/*
 * Class PostController
 *
 * @package Src
*/
class PostController extends Controller{


	/*
	 * Méthode qui permet d'afficher sur la page d'accueil les derniers articles du blog
	*/
	public function viewLast()
	{
		// Appel à la méthode du model qui affiche les 3 derniers post
		$postModel = new PostManager();
		$result = $postModel->readLast();
	
		require '../views/home.php';
	}

	/*
	 * Méthode pour afficher tous les articles du blog
	*/
	public function viewList(){
		// Appelle à la méthode du model qui affiche la liste des articles
		$postModel = new PostManager();
		$result = $postModel->readAll();
		require '../views/archive.php';
	}

	/*
	 * Méthode pour afficher un article
	*/
	public function viewSingle($params)
	{
		$postModel = new PostManager();
		$post = $postModel->read($params['slug'], $params['id']);
		// Appelle à la méthode qui affiche l'article en fonction de son id
		require '../views/single-post.php';
	}

}