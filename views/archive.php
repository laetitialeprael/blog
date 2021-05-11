<h1>Page de tous les articles</h1>
<p><a href="../blog/">Revenir à l'accueil</a></p>
<p>On affiche tous les articles</p>
<ul>
	<?php $db = new Src\Database('openclassroomsblog'); ?>

	<?php foreach ($db->query('SELECT * FROM post') as $post): ?>
		
		<h2><a href="<?php echo $post['slug']; ?>-<?php echo $post['id_post']; ?>"><?php echo $post['title']; ?></a></h2>
		<p><?php echo $post['content']; ?></p>
	
	<?php endforeach; ?>
</ul>