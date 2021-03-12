<?php

namespace App\Models;

use PDO;
use \Core\View;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class PostModel extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function addPost($titre, $contenu)
    {
        date_default_timezone_set('Europe/Paris');
        $db = static::getDB();
        $stmt = $db->prepare('INSERT INTO t_billet(BIl_DATE, BIl_TITRE, BIl_CONTENU, id_membre) VALUES("'.date('Y-m-d H:i:s').'", "'.$titre.'", "'.$contenu.'", '.$_SESSION['id'].')');
        $stmt->execute();
        echo "Ajout du post bien effectué";
    }

    public static function getAllPosts() {
        $db = static::getDB();
        $stmt = $db->prepare('SELECT * FROM t_billet');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}