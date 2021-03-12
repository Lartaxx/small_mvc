<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

session_start();
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('erreurs/500', ['controller' => 'Errors', 'action' => 'erreur_500']);
$router->add('erreurs/404', ['controller' => 'Errors', 'action' => 'erreur_404']);
$router->add('inscription/', ['controller' => 'Auth', 'action' => 'showRegister']);
$router->add('inscription/valid', ['controller' => 'Auth', 'action' => 'validRegister']);
$router->add('connexion/', ['controller' => 'Auth', 'action' => 'showLogin']);
$router->add('connexion/valid', ['controller' => 'Auth', 'action' => 'validLogin']);
$router->add('post/create/', ['controller' => 'Post', 'action' => 'create']);
$router->add('post/create/valid', ['controller' => 'Post', 'action' => 'postCreate']);
$router->add('deconnexion/', ['controller' => 'Auth', 'action' => 'validDeconnexion']);
$router->add('commentaires/create', ['controller' => 'Commentaires', 'action' => 'commentairesCreate']);
$router->dispatch($_SERVER['QUERY_STRING']);
