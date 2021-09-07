<?php

namespace Src\Controllers;

use Src\Models\PostManager;
use Src\Models\Post;

/*
 * Class PostController
 *
 * @package Src
*/
class PostController extends Controller
{
    /*
     * Méthode pour créer un article
     */
    public function postCreate()
    {
        $postModel = new PostManager();

        $categories = $postModel->readCategories();

        if (isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {
            $slug = Post::viewSlug(htmlspecialchars($_POST['title']));

            $post = $postModel->create(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['introduction']), htmlspecialchars($_POST['content']), $slug, htmlspecialchars($_POST['category_id_category']), $_SESSION['user']['iduser']);

            //On redirige l'utilisateur sur la page de ses articles
            header('Location: /blog/admin/mes-articles');
        }
        //Sinon on affiche le message d'erreur
        else {
            $_SESSION['message'] = "Oops ! Une erreur est survenue, votre article n'a pas été enregistré.";
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

        if (isset($_POST['title'], $_POST['introduction'], $_POST['content'], $_POST['category_id_category']) && ($_POST['title'] != '') && ($_POST['introduction'] != '') && ($_POST['content'] != '') && ($_POST['category_id_category'] !='')) {
            $slug = Post::viewSlug(htmlspecialchars($_POST['title']));

            $post = $postModel->update(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['introduction']), htmlspecialchars($_POST['content']), $slug, $_POST['category_id_category'], (int)$params['id']);

            $_SESSION['message'] = "Modifications enregistrées.";

            $post = $postModel->read($params['slug'], $params['id']);
        }

        require '../views/admin/update-post.php';
    }

    /*
     * Méthode pour afficher les articles sur le statut "en attente de validation" dans l'administration de l'utilisateur
    */
    public function postRead()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPostPending($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);

        require '../views/admin/dashboard-read-post.php';
    }

    /*
     * Méthode pour afficher les articles sur le statut "publiés" dans l'administration de l'utilisateur
     */
    public function postPublish()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPostPublished($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);

        require '../views/admin/dashboard-published-post.php';
    }

    /*
     * Méthode pour afficher les articles sur le statut "corbeille" dans l'administration de l'utilisateur
     *
     */
    public function postDelete()
    {
        $postModel = new PostManager();

        $result = $postModel->readUserPostDelete($_SESSION['user']['iduser']);
        $postDraft = $postModel->countPostDraft($_SESSION['user']['iduser']);
        $postPendingValidation = $postModel->countPostPendingValidation($_SESSION['user']['iduser']);
        $postPublished = $postModel->countPostPublished($_SESSION['user']['iduser']);

        require '../views/admin/dashboard-delete-post.php';
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
    public function viewList()
    {
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

    /*
     * Méthode pour afficher la page "Mentions légales"
    */
    public function viewMentions()
    {
        require '../views/mention-legal.php';
    }

    /*
     * Méthode pour afficher la page "Politique de confidentialité"
    */
    public function viewPolitique()
    {
        require '../views/politique-confidentialite.php';
    }

    /*
     * Méthode pour afficher la page "Cookies"
    */
    public function viewCookies()
    {
        require '../views/cookies.php';
    }
}
