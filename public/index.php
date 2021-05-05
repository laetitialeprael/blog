<?php

require '../vendor/autoload.php';

require '../pages/header.php';

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
$router->map('GET', '/blog/', function() {
    require '../pages/home.php';
});
$router->map('GET', '/blog/article', function() {
    require '../pages/archive.php';
});
$router->map('GET', '/blog/[*:slug]-[i:id]', function() {
    require '../pages/single-post.php';
});

/*
 * @var target qui contient les closures ?
 * @var params qui contient les parèmetres de l'url
 * @var name  qui contient le nom de la route si on lui a donnée un nom
*/ 
$match = $router->match();

//use Src\Database;
//$db = new Src\Database('openclassroomsblog');

if( is_array($match) && is_callable( $match['target'] ) ) {
	//ob_start();
	call_user_func_array( $match['target'], $match['params'] );
	//$content = ob_get_clean();
} else {
	echo 'On mettra la page 404';
}

require '../pages/footer.php';