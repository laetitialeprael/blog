<?php

require '../vendor/autoload.php';

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

$router->map('GET', '/blog/', 'Src\Controllers\PostController#viewLast');
$router->map('GET', '/blog/article', 'Src\Controllers\PostController#viewList');
$router->map('GET', '/blog/[*:slug]-[i:id]', 'Src\Controllers\PostController#viewSingle');

$router->map('GET', '/blog/connexion', 'Src\Controllers\UserController#login');
$router->map('GET', '/blog/creer-un-compte', 'Src\Controllers\UserController#createAccount');

// Routes d'administration
$router->map('GET', '/blog/admin/nouvel-article', 'Src\Controllers\PostController#adminCreate');
$router->map('GET', '/blog/admin/article/post=[i:id]&action=edit', 'Src\Controllers\PostController#adminUpdate');

/*
 * @var target qui contient les closures ?
 * @var params qui contient les parèmetres de l'url
 * @var name  qui contient le nom de la route si on lui a donnée un nom
*/ 
$match = $router->match();


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