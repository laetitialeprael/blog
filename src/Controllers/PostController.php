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
     * Méthode pour créer un article
    */
    public function postCreate()
    {
        $postModel = new PostManager();

        $categories = $postModel->readCategories();

        if(isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {

            $slug = Post::viewSlug($_POST['title']);
            
            $post = $postModel->create($_POST['title'], $_POST['introduction'], $_POST['content'], $slug, $_POST['category_id_category'], $_SESSION['user']['iduser']);
            
            echo 'Article ajouté';
        
        }
        require '../views/admin/create-post.php';
    }

    /*
     * Méthode pour afficher le formulaire de modification d'un article
    */
    public function postUpdate($params)
    {
        $postModel = new PostManager();
        $post = $postModel->read($params['slug'], $params['id']);
        $categories = $postModel->readCategories();

        if(isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {

            $slug = Post::viewSlug($_POST['title']);
            
            $post = $postModel->update($_POST['title'], $_POST['introduction'], $_POST['content'], $slug, $_POST['category_id_category'], (int)$params['id']);
            
            echo 'Modifications enregistrées';
        
        }
        require '../views/admin/update-post.php';
    }

    /*
     * Méthode pour afficher les articles de l'utilisateur
    */
    public function postRead()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPost($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);
        
        require '../views/admin/read-post.php';
    }
    
    /*
     * Méthode pour supprimer un article
    */
    public function postDelete()
    {
        require '../views/admin/delete-post.php';
    }

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