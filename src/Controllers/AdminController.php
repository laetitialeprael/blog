<?php

namespace Src\Controllers;

use Src\Models\UserManager;
use Src\Models\User;
use Src\Models\PostManager;
use Src\Models\Post;

use Src\Models\AdminManager;

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
     * Methode pour afficher les articles et commentaire sur le dashboard de l'administrateur
    */
    public function dashboardPost()
    {
        $adminModel = new AdminManager();
        $result = $adminModel->readPostPending();
        $count = $adminModel->countPostPending();
        //echo ($count);
        require '../views/admin/dashboard-post.php';
    }

    /*
     * Methode pour afficher les utilisateur sur le dashboard de l'administrateur
    */
    public function dashboardUser()
    {
        require '../views/admin/dashboard-user.php';
    }
    
}