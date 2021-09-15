<?php
/*
 * Créer la class global Manager qui se chargera de se connecter à la db
 * Vérifier si c'est le controller ou le model qui se connecte.
*/

namespace Src\Models;

use Src\Database;

/*
 * Class CommentManager
 *
 * @package Src
*/
class CommentManager extends Manager
{
    
    /**
     * Méthode pour afficher un commentaire
     * @return string
     */
    public function read($idcomment)
    {
        $db = $this->getDatabase();
        $results = $db->prepare(
            'SELECT comment.id_comment, comment.message, comment.status, comment.comment_date_creation, user.user_first_name, user.user_name FROM comment INNER JOIN user ON user.id_user = comment.user_id_user WHERE comment.id_comment = :id_comment',
            [':id_comment' => $idcomment],
            true
        );

        if ($results) {
            $comment = new Comment();
            $comment->hydrate($results);
            return $comment;
        }
        return false;
    }

    /**
     * Méthode pour mettre à jour un commentaire
     * @return string
     */
    public function update($message, $idcomment)
    {
        $db = $this->getDatabase();
        $comment = $db->insert(
        //$statement
        "UPDATE comment SET message = :message, state = 2 WHERE comment.id_comment = :id_comment",
        //$attributes
        [':message' => $message, 'id_comment' => $idcomment]
        );
    }
}
