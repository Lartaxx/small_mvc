<?php

namespace App\Models;

use PDO;
use \Core\View;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class PostCommentaires extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function addCommentaire($contenu, $bil_id)
    {
        date_default_timezone_set('Europe/Paris');
        $db = static::getDB();
        $stmt = $db->prepare('INSERT INTO t_commentaire(COM_DATE, COM_AUTEUR, COM_CONTENU, BIL_ID, id_membre) VALUES("'.date('Y-m-d H:i:s').'", "'.$_SESSION['username'].'", "'.$contenu.'", '.$bil_id.', '.$_SESSION['id'].')');
        $stmt->execute();
        echo "Ajout du commentaire bien effectuée";
    }

    public static function getComByID() {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT * FROM t_commentaire LEFT JOIN t_billet on t_billet.BIL_ID = t_commentaire.BIL_ID');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}