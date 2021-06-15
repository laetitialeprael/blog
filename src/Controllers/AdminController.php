<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;
use Src\Models\PostManager;
use Src\Models\Post;

/*
 * Class AdminController
 *
 * @package Src
*/
class AdminController extends Controller{

    /*
     * Méthode pour afficher la page d'administration d'un utilisateur
    */
    public function viewAccount(){
        require '../views/admin/account.php';

    }
    
    /*
     * Méthode pour déconnecter l'utilisateur
    */
    public function logout()
    {
        session_destroy();
        header('Location: /blog/');
    }
    
    /*
     * Méthode pour créer un article
    */
    public function postCreate()
    {
        $postModel = new PostManager();

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

        if(isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {

            $slug = Post::viewSlug($_POST['title']);

            //var_dump($_POST['title'], $_POST['introduction'], $_POST['content'], $slug, $_POST['category_id_category'], $params['id']);die;
            
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
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        require '../views/admin/read-post.php';
    }
    
    /*
     * Méthode pour supprimer un article
    */
    public function postDelete()
    {
        require '../views/admin/delete-post.php';
    }
}