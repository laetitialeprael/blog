<?php

namespace Src\Models;

use Src\Database;

/**
 * Class CommentManager
 *
 * @package Src
 */
class CommentManager extends Manager
{
    
    /**
     * Méthode pour afficher un commentaire
     * 
     * @param int $idcomment
     *
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
     * 
     * @param string $message
     * @param int    $status
     * @param int    $idcomment
     *
     * @return string
     */
    public function update($message, $status, $idcomment)
    {
        $db = $this->getDatabase();
        $comment = $db->insert(
        //$statement
            "UPDATE comment SET message = :message, status = :status WHERE comment.id_comment = :id_comment",
            //$attributes
            [':message' => $message, ':status' => $status, ':id_comment' => $idcomment]
        );
    }
}
