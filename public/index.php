<?php
session_start();

require '../vendor/autoload.php';

require '../views/head.php';
require '../views/header.php';

/*
 * @author Danny van Kooten
 * @link https://github.com/dannyvankooten/AltoRouter
*/

$router = new AltoRouter();

/*
 * Détermine quelle page on doit aller afficher
 *
 * @var $method string contient la méthode de la requête HTTP (GET|POST|PATCH|PUT|DELETE)
 * @var $route string contient le nom de l'url
 * @var $name string contient le nom de la fonction à utiliser
 * $router->map( 'POST', '/contact/', 'handleContactForm' );
 *
 * Reprendre pour utiliser le router afin de générer les urls
*/

// Routes publics
$router->map('GET', '/blog/mentions-legales', 'Src\Controllers\PostController#viewMentions');
$router->map('GET', '/blog/politique-de-confidentialite', 'Src\Controllers\PostController#viewPolitique');
$router->map('GET', '/blog/cookies', 'Src\Controllers\PostController#viewCookies');
$router->map('GET|POST', '/blog/contact', 'Src\Controllers\UserController#viewContact');

// Routes publics de la class PostController
$router->map('GET', '/blog/', 'Src\Controllers\PostController#viewLast', 'home');
$router->map('GET', '/blog/article', 'Src\Controllers\PostController#viewList');
$router->map('GET|POST', '/blog/article/[*:slug]-[i:id]', 'Src\Controllers\PostController#viewSingle');

// Routes admin de la class PostController
$router->map('GET|POST', '/blog/admin/nouvel-article', 'Src\Controllers\PostController#postCreate');
$router->map('GET|POST', '/blog/admin/mes-articles/[*:slug]-[i:id]', 'Src\Controllers\PostController#postUpdate');
$router->map('GET', '/blog/admin/mes-articles', 'Src\Controllers\PostController#postRead');
$router->map('GET', '/blog/admin/mes-articles/publies', 'Src\Controllers\PostController#postPublish');
$router->map('GET', '/blog/admin/mes-articles/corbeille', 'Src\Controllers\PostController#postDelete');

// Routes publics de la class UserController
$router->map('GET|POST', '/blog/connexion', 'Src\Controllers\UserController#viewLogin');
$router->map('GET|POST','/blog/creer-un-compte', 'Src\Controllers\UserController#viewAccount');
$router->map('GET|POST','/blog/creation-mot-de-passe/[*:token]', 'Src\Controllers\UserController#viewCreatePassword');
$router->map('GET|POST','/blog/mot-de-passe-oublie', 'Src\Controllers\UserController#viewRequestPassword');
$router->map('GET|POST','/blog/nouveau-mot-de-passe/[*:token]', 'Src\Controllers\UserController#viewUpdatePassword');


// Routes d'administration
$router->map('GET','/blog/admin/mon-compte', 'Src\Controllers\AdminController#viewAccount');
$router->map('GET', '/blog/admin/deconnexion', 'Src\Controllers\AdminController#logout');
$router->map('GET', '/blog/admin/tableau-de-bord/articles', 'Src\Controllers\AdminController#dashboardPost');
$router->map('GET', '/blog/admin/tableau-de-bord/commentaires', 'Src\Controllers\AdminController#dashboardComment');
$router->map('GET|POST', '/blog/admin/tableau-de-bord/commentaires/[i:id]', 'Src\Controllers\AdminController#dashboardUpdateComment');
$router->map('GET|POST', '/blog/admin/tableau-de-bord/articles-en-attente-validation/[*:slug]-[i:id]', 'Src\Controllers\AdminController#dashboardUpdatePost');
$router->map('GET', '/blog/admin/tableau-de-bord/utilisateurs', 'Src\Controllers\AdminController#dashboardUser');

/*
 * @var target qui contient les closures ?
 * @var params qui contient les parèmetres de l'url
 * @var name  qui contient le nom de la route si on lui a donnée un nom
*/ 
$match = $router->match();

unset($_SESSION['message']);

if($match == false){
	echo 'On mettra la page 404';
} else {
	list($controller, $action ) = explode('#', $match['target']);
		$controller = new $controller();
		if (is_callable(array($controller, $action))) {
	        call_user_func_array(array($controller,$action), array($match['params']));
	    } else {
	    	echo 'On mettra la page 404';
	    }
}

require '../views/footer.php';