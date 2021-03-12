<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\PostCommentaires;

/**
 * Home controller
 *
 * PHP version 7.0
 */
class Commentaires extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */

   public function commentairesCreate() {
       $posts = new PostCommentaires;
       if ( isset($_POST['com']) && !empty($_POST['com']) && isset($_POST['bil_id']) && !empty($_POST['bil_id'])) {
           $posts->addCommentaire($_POST['com'], $_POST['bil_id']);
       } 
   }
}
