<?php

namespace Src\Models;

/**
 * Class User
 *
 * @package Src
 */
class User
{
    /**
     * Définition des propriétés de User.
     *
     * @var $id_post int id de l'article
     * @var $title string titre de l'article
     * @var $introduction string introduction de l'article
     * @var $content string contenu de l'article
     */
    private $id_user;
    private $user_name;
    private $user_first_name;
    private $user_email;
    private $user_password;
    private $role;
    private $user_creation_date;
    private $gdpr_consent;
    private $last_visit_date;

    /**
     * Méthode pour hydrater les données
     * 
     * @param $datas array
     * 
     * @return void
     */
    public function hydrate(array $datas)
    {
        // On fait une boucle avec le tableau de données
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id_user;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        // Modifier la méthode pour faire afficher la première lettre du nom de famille suivit d'un point.
        return $this->user_name;
    }
    
    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->user_first_name;
    }
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->user_email;
    }
    
    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->user_password;
    }
    
    /**
     * @return int
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return int
     */
    public function getCreationDate()
    {
        return $this->user_creation_date;
    }

    /**
     * Méthode pour afficher le rôle de l'utilisateur
     *
     * @return string
     */
    public function viewRole()
    {
        if ($this->getRole() == 0) {
            return 'Contributeur en attente';
        } elseif ($this->getRole() == 1) {
            echo('Administrateur en attente');
        } elseif ($this->getRole() == 2) {
            echo('Contributeur');
        } else {
            echo('Administrateur');
        }
    }
}
