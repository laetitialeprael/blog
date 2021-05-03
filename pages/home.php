<?php
/*
 * Connexion à la BDD
 * On instancie la class PDO que l'on stock dans la variable $pdo
 * @var $pdo
*/
$pdo = new PDO('mysql:dbname=openclassroomsblog;host=localhost', "root", "root");
// Afficher les erreurs sql
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<h1>Page d'accueil</h1>
<p>On affiche quelques articles du blog</p>
<p><a href="index.php?page=blog">Voir tous les articles</a></p>