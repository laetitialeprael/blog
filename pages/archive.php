<h1>Page de tous les articles</h1>
<p><a href="index.php?page=accueil">Revenir à l'accueil</a></p>
<p>On affiche tous les articles</p>
<ul>
	<?php foreach ($db->query('SELECT * FROM post', 'Src\Models\Post') as $post): ?>
		
		<h2><a href="<?php echo $post->getUrl(); ?>"><?php echo $post->title; ?></a></h2>
		<p><?php echo $post->getExtract(); ?></p>
	
	<?php endforeach; ?>
</ul>