<?php

namespace App\Controllers;

use \Core\View;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Errors extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function erreur_500()
    {
        View::renderTemplate('500.html');
    }

    public function erreur_404()
    {
        View::renderTemplate('404.html');
    }



}
