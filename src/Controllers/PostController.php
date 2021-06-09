<?php

namespace Src\Controllers;

use Src\Models\PostManager;

/*
 * Class PostController
 *
 * @package Src
*/
class PostController extends Controller{


	/*
	 * Méthode qui permet d'afficher sur la page d'accueil les derniers articles du blog
	*/
	public function viewLast(){
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
	public function viewSingle($params){
		var_dump($params);
		
		$postModel = new PostManager();
		//var_dump($postModel);
		//$_SESSION['post']['idpost'] = $post->getId();
		//$_GET['idpost'] = $post->getId();
		$post = $postModel->read($params['slug'], $params['id']);
		//var_dump($post);

		// Appelle à la méthode qui affiche l'article en fonction de son id
		require '../views/single-post.php';
	}

	// Méthode pour afficher la page de création d'un article
	public function adminCreate(){
		$postModel = new PostManager();

		if(isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {

			$slug = $this->viewSlug($_POST['title']);
			
			$post = $postModel->create($_POST['title'], $_POST['introduction'], $_POST['content'], $slug, $_POST['category_id_category'], $_SESSION['user']['iduser']);
			
			echo 'Article ajouté';
		
		}
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