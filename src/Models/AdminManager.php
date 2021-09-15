<?php

namespace Src\Models;

use Src\Database;

/**
 * Class AdminManager
 *
 * @package Src
 */
class AdminManager extends Manager
{
    /**
     * Méthode pour afficher tous les articles en attente
     *
     * @return Post
     */
    public function readPostPending()
    {
        $db = $this->getDatabase();
        $results = $db->query(
            'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE  post.state = "2" ORDER BY post.post_creation_date DESC'
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
     * Méthode pour afficher tous les commentaires en attente
     * 
     * @return Comment
     */
    public function readCommentPending()
    {
        $db = $this->getDatabase();
        $results = $db->query(
            'SELECT comment.id_comment, comment.message, comment.status, comment.comment_date_creation FROM comment INNER JOIN user ON user.id_user = comment.user_id_user WHERE  comment.status = "0" ORDER BY comment.comment_date_creation DESC'
        );
        $comments = [];
        foreach ($results as $result) {
            $comment = new Comment();
            $comment->hydrate($result);
            $comments[] = $comment;
        }
        return $comments;
    }

    /**
     * Méthode pour mettre à jour un article
     *
     * @param string $title
     * @param string $introduction
     * @param string $content
     * @param string $slug
     * @param int    $category
     * @param int    $state
     * @param int    $idpost
     *
     * @return void
     */
    public function updatePostPublished($title, $introduction, $content, $slug, $category, $state, $idpost)
    {
        $db = $this->getDatabase();
        $post = $db->insert(
        //$statement
            "UPDATE post SET title = :title, introduction = :introduction, content = :content, slug = :slug, category_id_category = :category, state = :state, post_date_published = now() WHERE post.id_post = :id_post",
            //$attributes
            [':title' => $title, ':introduction' => $introduction, ':content' => $content, ':slug' => $slug, ':category' => $category, 'state' => $state, 'id_post' => $idpost]
        );
    }
    /**
     * Méthode pour compter le nombre d'article
     *
     * @param int $statut
     *
     * @return int $results
     */
    public function countPostPending($statut)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS pending from post WHERE post.state = :post_satut',
            [':post_satut' => $statut],
            true
        );

        return $results;
    }
    /**
     * Méthode pour compter le nombre de commentaire
     *
     * @param int $status
     *
     * @return int $results
     */
    public function countCommentPending($status)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS pending from comment WHERE comment.status = :comment_status',
            [':comment_status' => $status],
            true
        );

        return $results;
    }
}
