<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\AddUser;
use \App\Models\User;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Auth extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */

    public function showRegister() {
        View::renderTemplate('inscription/inscription.html');
    }

    public function validRegister() {
        $user = new AddUser;
        if ( isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['mdp']) && !empty($_POST['mdp'])) {
            $user->addUser($_POST['nom'], $_POST['mdp']);
        }
    }

    public function showLogin() {
        View::renderTemplate('connexion/connexion.php');
    }

    public function validLogin() {
        $users = new User;
        foreach($users->getAll() as $user ) {
            if ( $_POST['nom'] === $user['nom'] && password_verify($_POST['mdp'], $user['mdp']) ) {
                $_SESSION['username'] = $user['nom'];
                $_SESSION['id'] = $user['id_membre'];
            }
            else {
                echo "Erreur..";
            }
        }
    }

    public function validDeconnexion() {
        unset($_SESSION['username']);
        unset($_SESSION['id']);
    }


}
