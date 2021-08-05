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
        $count = $adminModel->countPostPending(2);
        //il reste à afficher le nombre de commentaire et la liste des commentaire 'en attente de validation'

        require '../views/admin/dashboard-post.php';
    }

    /*
     * Méthode pour afficher les utilisateur sur le dashboard de l'administrateur
    */
    public function dashboardUser()
    {
        $adminModel = new AdminManager();
        $countPendingAdmin = $adminModel->countUser(0);
        $countPendingUser = $adminModel->countUser(1);
        $countActiveAdmin = $adminModel->countUser(2);
        $countActiveUser = $adminModel->countUser(3);

        $users = $adminModel->readUserCreation();
        var_dump($users);

        //$firstname = $users->getName();

        require '../views/admin/dashboard-user.php';
    }
    
}