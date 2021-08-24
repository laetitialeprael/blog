<?php
/*
 * Créer la class global Manager qui se chargera de se connecter à la db
 * Vérifier si c'est le controller ou le model qui se connecte.
*/
namespace Src\Models;

use Src\Database;
/*
 * Class AdminManager
 *
 * @package Src
*/
class AdminManager extends Manager{

    /*
     * Méthode pour afficher tous les articles en attente
     * @return string
    */
    public function readPostPending()
    {
        $db = $this->getDatabase();
        $results = $db->query(
            'SELECT post.id_post, post.title, post.introduction, post.content, post.state, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE  post.state = "2" ORDER BY post.post_creation_date DESC');
        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }
    /*
     * Méthode pour mettre à jour un article
    */
    public function updatePostPublished($title, $introduction, $content, $slug, $category, $idpost)
    {
        $db = $this->getDatabase();
        $post = $db->insert(
        //$statement
        "UPDATE post SET title = :title, introduction = :introduction, content = :content, slug = :slug, category_id_category = :category, state = 3 WHERE post.id_post = :id_post",
        //$attributes
        array(':title' => $title, ':introduction' => $introduction, ':content' => $content, ':slug' => $slug, ':category' => $category, 'id_post' => $idpost));
    }
    /*
     * Méthode pour compter le nombre d'article
     * @param le statut de l'article
    */
    public function countPostPending($statut)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS pending from post WHERE post.state = :post_satut',
            array(':post_satut' => $statut), true);

        return $results;
    }

    /*
     * Méthode pour afficher les utilisateurs en fonction de leur date de création
    */
    public function readUserCreation()
    {
        $db = $this->getDatabase();
        $results = $db->query(
            'SELECT user.id_user, user.user_name, user.user_first_name, user.role, user.user_creation_date, user.gdpr_consent FROM user WHERE user.user_creation_date BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW() ORDER BY user.user_creation_date DESC');
        
        return $results;
    }

    /*
     * Méthode pour compter le nombre d'utilisateur
     * @param le role de l'utilisateur
    */
    public function countUser($role)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT COUNT(*) AS role from user WHERE user.role = :user_role',
            array(':user_role' => $role), true);

        return $results;
    }
}