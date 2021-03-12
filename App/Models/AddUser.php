<?php

namespace App\Models;

use PDO;
use \Core\View;

/**
 * Example user model
 *
 * PHP version 7.0
 */
class AddUser extends \Core\Model
{

    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function addUser($nom, $mdp)
    {
        $db = static::getDB();
        $stmt = $db->prepare('INSERT INTO membre(nom, mdp) VALUES("'.$nom.'", "'.password_hash($mdp, PASSWORD_BCRYPT).'")');
        $stmt->execute();
        $_SESSION['username'] = $nom;
    }
}
