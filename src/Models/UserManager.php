<?php

namespace Src\Models;

use Src\Database;

/**
 * Class UserManager
 *
 * @package Src
 */
class UserManager extends Manager
{
    /**
     * Méthode pour enregistrer un utilisateur
     * 
     * @param string $name
     * @param string $firstname
     * @param string $email
     * 
     * @return void
     */
    public function create($name, $firstname, $email)
    {
        $db = $this->getDatabase();
        $user = $db->insert(
            'INSERT INTO user (user_name, user_first_name, user_email) VALUES (:user_name, :user_first_name, :user_email)',
            [':user_name' => $name,':user_first_name' => $firstname,':user_email' => $email]
        );
    }

    /**
     * Méthode pour afficher les données de l'utilisateur
     * 
     * @return array $user
     */
    public function read()
    {
        $db = $this->getDatabase();
        $user = $db->prepare('SELECT * FROM user WHERE user.user_password = :user_password', [':user_password' => $password], true);
        return $user;
    }

    /**
     * Méthode pour enregistrer le mot de passe de l'utilisateur
     * 
     * @param string $password
     * @param string $email
     * 
     * @return void
     */
    public function createPassword($password, $email)
    {
        $db = $this->getDatabase();
        $user = $db->insert(
            'UPDATE user SET user_password = :user_password, role = "2" WHERE user.user_email = :user_email',
            [':user_password' => $password, ':user_email' => $email]
        );
    }

    /**
     * Méthode pour mettre à jour le mot de passe de l'utilisateur
     * 
     * @param string $password
     * @param string $email
     * 
     * @return void
     */
    public function updatePassword($password, $email)
    {
        $db = $this->getDatabase();
        $user = $db->insert(
            'UPDATE user SET user_password = :user_password WHERE user.user_email = :user_email',
            [':user_password' => $password, ':user_email' => $email]
        );
    }

    /**
     * Méthode pour afficher les données de l'utilisateur
     * 
     * @param string $email
     * 
     * @return User
     */
    public function connexion($email)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT * FROM user WHERE user.user_email = :user_email',
            [':user_email' => $email],
            true
        );

        if ($results) {
            $user = new User();
            $user->hydrate($results);
            return $user;
        }
        return false;
    }
}
