<?php use Src\Controllers\Controller; ?>

<h1>Page d'accueil</h1>
<p>On affiche quelques articles du blog</p>

<ul>
	<?php $db = new Controller($this->getDatabase()); ?>
	
	<?php foreach ($db->query('SELECT * FROM post') as $post): ?>
		<h2><a href="#"><?php echo $post['title']; ?></a></h2>
		<p><?php echo $post['content']; ?></p>
	<?php endforeach; ?>
</ul>

<p><a href="../blog/article">Voir tous les articles</a></p>