<h1>Page d'accueil</h1>
<p>On affiche quelques articles du blog</p>

<ul>
	
	<?php foreach ($result as $post): ?>
		
		<h2><a href="#"><?php echo $post->getTitle(); ?></a></h2>
		<p><?php echo '' ?></p>
	
	<?php endforeach; ?>
</ul>

<p><a href="../blog/article">Voir tous les articles</a></p>