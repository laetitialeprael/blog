<?php

// Le code ci-dessous devra être dans une class Models
$db = new Src\Database('openclassroomsblog');
$datas = $db->query('SELECT * FROM post');

var_dump($datas);
?>
<h1>Page d'accueil</h1>
<p>On affiche quelques articles du blog</p>
<p><a href="index.php?page=blog">Voir tous les articles</a></p>