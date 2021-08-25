<?php

namespace Src\Models;

/**
 * Class Post
 *
 * @package Src
 */
class Post
{
    /**
     * On définit des proporiété de Post.
     * 
     * @var int $id_post
     * @var string $title
     * @var string $introduction
     * @var string $content
     * @var int $state
     * @var string $post_creation_date
     * @var string $slug
     * @var string $post_date_update
     * @var string $post_date_published
     * @var int $id_category
     * @var string $category_name
     * @var int $user_id_user
     * @var string $user_name
     * @var string $user_first_name
     */
    private $id_post;
    private $title;
    private $introduction;
    private $content;
    private $state;
    private $post_creation_date;
    private $slug;
    private $post_date_update;
    private $post_date_published;
    private $id_category;
    private $category_name;
    private $user_id_user;
    private $user_name;
    private $user_first_name;
    
    /**
     * Méthode pour hydrater les données
     * 
     * @param $datas array
     * 
     * @return void
     */
    public function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $id_post
     * 
     * @return int
     */
    public function getId()
    {
        return $this->id_post;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $introduction
     * 
     * @return string
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $content
     * 
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $state
     * 
     * @return string
     */
    public function getSate()
    {
        return $this->state;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $post_creation_date
     * 
     * @return string
     */
    public function getCreationDate()
    {
        return $this->post_creation_date;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $slug
     * 
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Getter qui permet d'accéder à la propriété privée $id_category
     * 
     * @return int
     */
    public function getIdCategory()
    {
        return $this->id_category;
    }
    
    /**
     * Getter qui permet d'accéder à la propriété privée $category_name
     * 
     * @return string
     */
    public function getCategory()
    {
        return $this->category_name;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $user_name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->user_name;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $user_first_name
     * 
     * @return string
     */
    public function getFirstName()
    {
        return $this->user_first_name;
    }

    /**
     * Méthode qui permet d'afficher un extrait de l'article
     * 
     * @return string $html
     */
    public function viewExtract()
    {
        // Si le texte d'introduction est vide
        if (empty($this->getIntroduction())) {
            // On affiche un extrait du contenu
            $html = substr($this->getContent(), 0, 150) . '...';
        } else {
            // Sinon on affiche un extrait du text d'introduction
            $html = substr($this->getIntroduction(), 0, 150) . '...';
        }
        return $html;
    }

    /**
     * Méthode qui permet d'afficher le prénom et la première lettre du nom de l'auteur de l'article
     * 
     * @return string $html
     */
    public function viewAuthor()
    {
        $html = substr($this->getName(), 0, 1) . '. ' . $this->getFirstName();
        return $html;
    }

    /**
     * Méthode qui permet de générer l'url des articles
     * 
     * @return string $url
     */
    public function viewUrl()
    {
        $url = $this->getSlug() . '-' . $this->getId();
        return $url;
    }

    /**
     * Méthode qui permet d'afficher le statut des articles
     * 
     * @return string
     */
    public function viewState()
    {
        if ($this->getSate() == 0) {
            return('Corbeille');
        } elseif ($this->getSate() == 1) {
            return('En cours de modification');
        } elseif ($this->getSate() == 2) {
            return('En attente de validation');
        } else {
            return('Publié');
        }
    }

    /**
     * Méthode qui permet de générer le slug d'un article
     * 
     * @param string $string
     * @param string $delimiter
     * 
     * @return string $clean
     */
    public static function viewSlug($string, $delimiter = '-')
    {
        $oldLocale = setlocale(LC_ALL, '0');
        setlocale(LC_ALL, 'en_US.UTF-8');
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower($clean);
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
        $clean = trim($clean, $delimiter);
        setlocale(LC_ALL, $oldLocale);
        return $clean;
    }
}
