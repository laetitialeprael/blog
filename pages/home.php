<?php
/*
 * Connexion à la BDD
 * On instancie la class PDO que l'on stock dans la variable $pdo
 * @var $pdo
*/
$pdo = new PDO('mysql:dbname=openclassroomsblog;host=localhost', "root", "root");
// Affiche le nombre de résulatat affecté
$count = $pdo->exec('INSERT INTO post SET title="Mon titre", date="' . date('Y-m-d H:i:s') . '"');
var_dump($count);
?>
<h1>Page d'accueil</h1>
<p>On affiche quelques articles du blog</p>
<p><a href="index.php?page=blog">Voir tous les articles</a></p>