<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;
use Src\Models\PostManager;
use Src\Models\Post;
use Src\Models\Comment;
use Src\Models\CommentManager;

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
     * @return void
     */
    public function viewAccount()
    {
        include '../views/admin/dashboard-account.php';
    }

    /**
     * Méthode pour déconnecter l'utilisateur
     *
     * @return void
     */
    public function logout()
    {
        session_destroy();
        header('Location: /blog/');
    }

    /**
     * Methode pour afficher les articles sur le dashboard de l'administrateur
     *
     * @return void
     */
    public function dashboardPost()
    {
        $adminModel = new AdminManager();

        $result = $adminModel->readPostPending();
        $count = $adminModel->countPostPending(2);

        include '../views/admin/dashboard-post.php';
    }

    /**
     * Méthode pour afficher les commentaire sur le dashboard de l'administrateur
     * 
     * @return void
     */
    public function dashboardComment()
    {
        $adminModel = new AdminManager();
        
        $result = $adminModel->readCommentPending();
        $count = $adminModel->countCommentPending(0);

        include '../views/admin/dashboard-comment.php';
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


        if (isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category'], $_POST['state']) && ($_POST['title'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='') && ($_POST['state'] !='')) {
            $slug = Post::viewSlug(htmlspecialchars($_POST['title']));

            $post = $adminModel->updatePostPublished(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['introduction']), htmlspecialchars($_POST['content']), $slug, $_POST['category_id_category'], $_POST['state'], (int)$params['id']);

            $_SESSION['message-valid'] = "Modifications enregistrées.";

            $post = $postModel->read($params['slug'], $params['id']);
        }
        include '../views/admin/dashboard-update-post.php';
    }

    /**
     * Méthode pour afficher le formulaire de modification d'un commentaire
     * 
     * @param  int $params
     * 
     * @return void
     */
    public function dashboardUpdateComment($params)
    {
        $commentModel = new CommentManager();
        $comment = $commentModel->read($params['id']);

        if (isset($_POST['message'], $_POST['status']) && ($_POST['message'] != '') && ($_POST['status'] != '')) {
            $comment = $commentModel->update(htmlspecialchars($_POST['message']), $_POST['status'], (int)$params['id']);
            $_SESSION['message-valid'] = 'Mise à jour enregistrée.';
            $comment = $commentModel->read($params['id']);
        }

        include '../views/admin/dashboard-update-comment.php';
    }
}
