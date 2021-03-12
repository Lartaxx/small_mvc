<?php

namespace App\Models;

use PDO;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class User extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getUsers($name, $password)
    {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM membre WHERE nom = "'.$name.'" AND mdp = "'.$password.'"');
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getAll() {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM membre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserById() {
        $db = static::getDB();
        $stmt = $db->query('SELECT * FROM membre LEFT JOIN t_billet ON membre.id_membre = t_billet.id_membre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
