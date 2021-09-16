<?php

namespace Src\Controllers;

use Src\Models\PostManager;
use Src\Models\Post;

/**
 * Class PostController
 *
 * @package Src
 */
class PostController extends Controller
{
    /**
     * Méthode pour créer un article
     * 
     * @return void
     */
    public function postCreate()
    {
        $postModel = new PostManager();

        $categories = $postModel->readCategories();

        if (isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {
            $slug = Post::viewSlug(htmlspecialchars($_POST['title']));

            $post = $postModel->create(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['introduction']), htmlspecialchars($_POST['content']), $slug, htmlspecialchars($_POST['category_id_category']), $_SESSION['user']['iduser']);

            //On redirige l'utilisateur sur la page de ses articles
            header('Location: /blog/admin/mes-articles');
            $_SESSION['message-valid'] = "Article enregistré.";
        }
        include '../views/admin/create-post.php';
    }

    /**
     * Méthode pour afficher le formulaire de modification d'un article
     * 
     * @param string|int $params
     * 
     * @return void
     */
    public function postUpdate($params)
    {

        $postModel = new PostManager();
        $post = $postModel->read($params['slug'], $params['id']);
        $categories = $postModel->readCategories();

        if (isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {
            $slug = Post::viewSlug(htmlspecialchars($_POST['title']));

            $post = $postModel->update(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['introduction']), htmlspecialchars($_POST['content']), $slug, $_POST['category_id_category'], (int)$params['id']);

            header('Location: /blog/admin/mes-articles');
            $_SESSION['message-valid-update'] = "Modifications enregistrées.";

        }
        include '../views/admin/update-post.php';
    }

    /**
     * Méthode pour afficher les articles sur le statut "en attente de validation" dans l'administration de l'utilisateur
     * 
     * @return void
     */
    public function postRead()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPostPending($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);

        include '../views/admin/dashboard-read-post.php';
    }

    /**
     * Méthode pour afficher les articles sur le statut "publiés" dans l'administration de l'utilisateur
     * 
     * @return void
     */
    public function postPublish()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPostPublished($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);

        include '../views/admin/dashboard-published-post.php';
    }

    /**
     * Méthode pour afficher les articles sur le statut "corbeille" dans l'administration de l'utilisateur
     * 
     * @return void
     */
    public function postDelete()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPostDelete($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);

        include '../views/admin/dashboard-delete-post.php';
    }

    /**
     * Méthode qui permet d'afficher sur la page d'accueil les derniers articles du blog
     * 
     * @return void
     */
    public function viewLast()
    {
        // Appel à la méthode du model qui affiche les 3 derniers post
        $postModel = new PostManager();
        $result = $postModel->readLast();

        include '../views/home.php';
    }

    /**
     * Méthode pour afficher tous les articles du blog
     * 
     * @return void
     */
    public function viewList()
    {
        // Appelle à la méthode du model qui affiche la liste des articles
        $postModel = new PostManager();
        $result = $postModel->readAll();
        include '../views/archive.php';
    }

    /**
     * Méthode pour afficher un article et enregistrer un commentaire
     * 
     * @param string|int $params
     * 
     * @return void
     */
    public function viewSingle($params)
    {
        $postModel = new PostManager();
        $post = $postModel->read($params['slug'], $params['id']);
        $comments = $postModel->readComment($params['id']);
        $count = $postModel->countCommentPublished($params['id']);

        if (isset($_POST['message']) && ($_POST['message'] != '')) {
            $post = $postModel->createComment(htmlspecialchars($_POST['message']), $params['id'], $_SESSION['user']['iduser']);
            header("Location:/blog/article/".$params['slug']."-".$params['id']."");
            $_SESSION['message-valid-comment'] = "Merci pour votre commentaire. Il est en cours de relecture.";
        }
        // Appelle à la méthode qui affiche l'article en fonction de son id
        include '../views/single-post.php';
    }

    /**
     * Méthode pour afficher la page "Mentions légales"
     * 
     * @return void
     */
    public function viewMentions()
    {
        include '../views/mention-legal.php';
    }

    /**
     * Méthode pour afficher la page "Politique de confidentialité"
     * 
     * @return void
     */
    public function viewPolitique()
    {
        include '../views/politique-confidentialite.php';
    }

    /**
     * Méthode pour afficher la page "Cookies"
     * 
     * @return void
     */
    public function viewCookies()
    {
        include '../views/cookies.php';
    }
}
