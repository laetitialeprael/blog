<?php

namespace Src\Models;

use Src\Database;

/**
 * Class PostManager
 *
 * @package Src
 */
class PostManager extends Manager
{
    /**
     * Méthode pour créer un article
     * 
     * @param string $title
     * @param string $introduction
     * @param string $content
     * @param string $slug
     * @param int    $category
     * @param int    $user
     *
     * @return Post 
     */
    public function create($title, $introduction, $content, $slug, $category, $user)
    {
        $db = $this->getDatabase();
        $results = $db->insert(
        //$statement
            'INSERT INTO post (title, introduction, content, state, slug, category_id_category, user_id_user) VALUES (:title, :introduction, :content, 2, :slug, :category_id_category, :user_id_user)',
            //$attributes
            [':title' => $title, ':introduction' => $introduction, ':content' => $content, ':slug' => $slug, ':category_id_category' => $category, ':user_id_user' => $user]
        );

        if ($results) {
            $post = new Post();
            $post->hydrate($results);
            return $post;
        }
        return false;
    }

    /**
     * Méthode pour créer un commentaire sur un article
     * 
     * @param string $message
     * @param int    $post
     * @param int    $user
     *
     * @return Post
     */
    public function createComment($message, $post, $user)
    {
        $db = $this->getDatabase();
        $results = $db->insert(
            'INSERT INTO comment (message, status, post_id_post, user_id_user) VALUES (:message, 0, :post_id_user, :user_id_user)',
            [':message' => $message, ':post_id_user' => $post, ':user_id_user' => $user]
        );

        if ($results) {
            $post = new Post();
            $post->hydrate($results);
            return $post;
        }
        return false;
    }

    /**
     * Méthode pour mettre à jour un article
     * 
     * @param string $title
     * @param string $introduction
     * @param string $content
     * @param string $slug
     * @param int    $category
     * @param int    $idpost
     *
     * @return void
     */
    public function update($title, $introduction, $content, $slug, $category, $idpost)
    {
        $db = $this->getDatabase();
        $post = $db->insert(
        //$statement
            "UPDATE post SET title = :title, introduction = :introduction, content = :content, slug = :slug, category_id_category = :category, state = 2, post_date_update = now() WHERE post.id_post = :id_post",
            //$attributes
            [':title' => $title, ':introduction' => $introduction, ':content' => $content, ':slug' => $slug, ':category' => $category, 'id_post' => $idpost]
        );
    }

    /**
     * Méthode pour afficher tous les articles du blog
     *
     * @return Post
     */
    public function readAll()
    {
        $db = $this->getDatabase();
        $results = $db->query('SELECT post.id_post, post.title, post.introduction, post.content, post.post_date_published, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE post.state = 3 ORDER BY post.post_date_published DESC');
        // transforme le retour en class Post()
        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * Méthode pour afficher les 3 derniers articles du blog
     *
     * @return Post
     */
    public function readLast()
    {
        $db = $this->getDatabase();
        $results = $db->query('SELECT post.id_post, post.title, post.introduction, post.content, post.post_date_published, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE post.state = 3 ORDER BY post.post_date_published DESC LIMIT 3');
        // transforme le retour en class Post()
        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * Méthode pour afficher un article
     * 
     * @param string $slug
     * @param int    $idpost
     *
     * @return Post
     */
    public function read($slug, $idpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_date_published, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE post.id_post = :id_post AND post.slug = :slug',
            [':id_post' => $idpost, ':slug' => $slug],
            true
        );

        if ($results) {
            $post = new Post();
            $post->hydrate($results);
            return $post;
        }
        return false;
    }

    /**
     * Méthode pour afficher les commentaires approuvés liés à un article
     * 
     * @param int $idpost
     *
     * @return Post
     */
    public function readComment($idpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT comment.message, comment.status, comment.comment_date_creation, comment.post_id_post, user.user_first_name, user.user_name FROM comment INNER JOIN user ON user.id_user = comment.user_id_user WHERE comment.post_id_post = :id_post AND comment.status = 1',
            [':id_post' => $idpost]
        );

        $comments = [];
        foreach ($results as $result) {
            $comment = new Post();
            $comment->hydrate($result);
            $comments[] = $comment;
        }
        return $comments;
    }

    /**
     * Méthode pour afficher les articles "en attente de validation" par un utilisateur connecté à son profil
     * 
     * @param int $iduserpost
     *
     * @return Post
     */
    public function readUserPostPending($iduserpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE  post.state = "2" AND post.user_id_user = :user_id_user ORDER BY post.post_creation_date DESC',
            [':user_id_user' => $iduserpost]
        );

        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * Méthode pour afficher les articles "publiés" par un utilisateur connecté à son profil
     * 
     * @param int $iduserpost
     *
     * @return Post
     */
    public function readUserPostPublished($iduserpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE  post.state = "3" AND post.user_id_user = :user_id_user ORDER BY post.post_creation_date DESC',
            [':user_id_user' => $iduserpost]
        );

        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * Méthode pour afficher les articles mis à la "corbeille" par un utilisateur connecté à son profil
     * 
     * @param int $iduserpost
     *
     * @return Post
     */
    public function readUserPostDelete($iduserpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE  post.state = "0" AND post.user_id_user = :user_id_user ORDER BY post.post_creation_date DESC',
            [':user_id_user' => $iduserpost]
        );

        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * Méthode pour afficher les catégories d'article
     * 
     * @return Post
     */
    public function readCategories()
    {
        $db = $this->getDatabase();
        $results = $db->query(
            'SELECT * FROM category ORDER BY category.id_category DESC'
        );

        $categories = [];
        foreach ($results as $result) {
            $category = new Post();
            $category->hydrate($result);
            $categories[] = $category;
        }
        return $categories;
    }

    /**
     * Méthode pour compter le nombre d'article sur le statut 'corbeille'
     * 
     * @param int $iduserpost
     *
     * @return int
     */
    public function countPostDraft($iduserpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS draft from post WHERE post.state = "0" AND post.user_id_user = :user_id_user',
            [':user_id_user' => $iduserpost],
            true
        );

        return $results;
    }

    /**
     * Méthode pour compter le nombre d'article sur le statut 'en attente de validation'
     * 
     * @param int $iduserpost
     *
     * @return int
     */
    public function countPostPendingValidation($iduserpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS pending from post WHERE post.state = "2" AND post.user_id_user = :user_id_user',
            [':user_id_user' => $iduserpost],
            true
        );

        return $results;
    }

    /**
     * Méthode pour compter le nombre d'article sur le statut 'publié'
     * 
     * @param int $iduserpost
     *
     * @return int
     */
    public function countPostPublished($iduserpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS published from post WHERE post.state = "3" AND post.user_id_user = :user_id_user',
            [':user_id_user' => $iduserpost],
            true
        );

        return $results;
    }

    /**
     * Méthode pour compter le nombre de commentaire d'un article sur le statut 'approuvé'
     * 
     * @param int $iduserpost
     *
     * @return int
     */
    public function countCommentPublished($idpost)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS approved from comment WHERE comment.status = "1" AND comment.post_id_post = :id_post',
            [':id_post' => $idpost],
            true
        );

        return $results;
    }
}
