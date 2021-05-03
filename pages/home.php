<h1>Page d'accueil</h1>
<p>On affiche quelques articles du blog</p>

<ul>
	<?php foreach ($db->query('SELECT * FROM post', 'Src\Models\Post') as $post): ?>
		
		<h2><a href="<?php echo $post->getUrl(); ?>"><?php echo $post->title; ?></a></h2>
		<p><?php echo $post->getExtract(); ?></p>
	
	<?php endforeach; ?>
</ul>

<p><a href="index.php?page=blog">Voir tous les articles</a></p>