<?php

namespace Src\Models;

/**
 * Class Comment
 *
 * @package Src
 */
class Comment
{
    /**
     * On définit des proporiété de Comment.
     * 
     * @var int $id_comment
     * @var string $message
     * @var int $status
     * @var string $comment_date_creation
     * @var int $post_id_post
     * @var int $user_id_user
     * @var string $user_name
     * @var string $user_first_name
     */
    private $id_comment;
    private $message;
    private $status;
    private $comment_date_creation;
    private $post_id_post;
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
     * Getter qui permet d'accéder à la propriété privée $id_comment
     * 
     * @return int
     */
    public function getIdComment()
    {
        return $this->id_comment;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $message
     * 
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $status
     * 
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $comment_date_creation
     * 
     * @return string
     */
    public function getDate()
    {
        return $this->comment_date_creation;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $post_id_post
     * 
     * @return int
     */
    public function getIdPost()
    {
        return $this->post_id_post;
    }

    /**
     * Getter qui permet d'accéder à la propriété privée $user_id_user
     * 
     * @return int
     */
    public function getIdUser()
    {
        return $this->user_id_user;
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
     * Méthode qui permet d'afficher le prénom et la première lettre du nom de l'auteur de l'article
     * 
     * @return string $html
     */
    public function viewAuthor()
    {
        $html = substr($this->getName(), 0, 1) . '. ' . $this->getFirstName();
        return $html;
    }

}