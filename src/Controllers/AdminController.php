<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;
use Src\Models\PostManager;
use Src\Models\Post;

use Src\Models\AdminManager;

/**
 * Class AdminController
 *
 * @package Src
 */
class AdminController extends Controller
{

    /**
     * Méthode pour afficher le profil d'un utilisateur
     * 
     * La méthode doit être déplacer chez UserController.php
     * elle est générale à tous les utilisateurs.
     * 
     * @return void
     */
    public function viewAccount()
    {
        include '../views/admin/dashboard-account.php';
    }
    
    /**
     * Méthode pour déconnecter l'utilisateur
     * 
     * La méthode doit être déplacer chez UserController.php
     * elle est générale à tous les utilisateurs.
     * 
     * @return void
     */
    public function logout()
    {
        session_destroy();
        header('Location: /blog/');
    }

    /**
     * Methode pour afficher les articles et commentaires sur le dashboard de l'administrateur
     * 
     * @return void
     */
    public function dashboardPost()
    {
        $adminModel = new AdminManager();
        
        $result = $adminModel->readPostPending();
        $count = $adminModel->countPostPending(2);
        //il reste à afficher le nombre de commentaire et la liste des commentaire 'en attente de validation'

        include '../views/admin/dashboard-post.php';
    }

    /**
     * Méthode pour afficher le formulaire de modification d'un article
     * 
     * @param string|int $params
     * 
     * @return void
     */
    public function dashboardUpdatePost($params)
    {
        $adminModel = new AdminManager();

        $postModel = new PostManager();
        $post = $postModel->read($params['slug'], $params['id']);
        $categories = $postModel->readCategories();


        if (isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {

            $slug = Post::viewSlug(htmlspecialchars($_POST['title']));
            
            $post = $adminModel->updatePostPublished(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['introduction']), htmlspecialchars($_POST['content']), $slug, $_POST['category_id_category'], (int)$params['id']);
            
            $_SESSION['message'] = "Article publié !";

            $post = $postModel->read($params['slug'], $params['id']);        
        }
        include '../views/admin/dashboard-update-post.php'; 
    }
}