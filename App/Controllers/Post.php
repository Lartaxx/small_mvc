<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\PostModel;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Post extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */

   public function create() {
       return View::renderTemplate('post/create.html');
   }

   public function postCreate() {
       $posts = new PostModel;
       if ( isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['contenu']) ) {
           $posts->addPost($_POST['titre'], $_POST['contenu']);
       } 
   }
}
