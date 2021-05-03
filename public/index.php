<?php
// On remplacera par l'aoutoader de composer
require '../src/Autoloader.php';

Src\Autoloader::register();

// On remplacera par le router
// Les urls de page seront en français
if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 'accueil';
}
// On met en place des conditions pour vérifier manuellement les fonctions
// Le nom des fichiers est en anglais

/*
 * accueil : http://localhost:8888/blog/public/index.php?page=accueil
 * blog : http://localhost:8888/blog/public/index.php?page=blog
 *
*/

// Initialisation des objets
$db = new Src\Database('openclassroomsblog');


ob_start();
// Si je veux essayer d'accéder à la page d'accueil
if ($page == 'accueil') {
	// On require le fichier home.php
	require '../pages/home.php';
} elseif ($page == 'blog') {
	require '../pages/archive.php';
}
$content = ob_get_clean();
// On require le template de page par défaut qui contient la variable $content pour afficher le contenu de nos différentes pages
// home.php, acrhives.php
require '../pages/page.php';