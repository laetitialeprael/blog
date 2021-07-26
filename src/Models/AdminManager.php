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
        $results = $db->query('SELECT post.id_post, post.title, post.introduction, post.content, post.post_creation_date, post.slug, post.category_id_category, user.user_first_name, user.user_name, category.category_name FROM user INNER JOIN post ON user.id_user = post.user_id_user INNER JOIN category ON post.category_id_category = category.id_category WHERE post.state = 2 ORDER BY post.post_creation_date DESC');
        // transforme le retour en class Post()
        $posts = [];
        foreach ($results as $result) {
            $post = new Post();
            $post->hydrate($result);
            $posts[] = $post;
        }
        return $posts;
    }
    /*
     * Méthode pour compter le nombre d'article en attente
     * @return int
     */
    public function countPostPending()
    {
        $db = $this->getDatabase();
        $results = $db->query(
            'SELECT COUNT(*) AS pending from post WHERE post.state = "2"');
        //var_dump($results); die;
        return $results;
    }
}