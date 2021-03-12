<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Models\PostCommentaires;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Home extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $user_find = new User;
        $coms = new PostCommentaires;
        $com = $coms->getComByID();
        $user = $user_find->getUserById();
        View::renderTemplate('Home/index.php', compact("user", "com"));
    }

    public function createAccount() {
        View::renderTemplate('inscription/inscription.html');
    }


}
