<?php

$post = $db->prepare('SELECT * FROM post WHERE id_post = ?', [$_GET['id']], 'Src\Models\Post', true);

?>
<p><a href="index.php?page=blog">Voir tous les articles</a></p>
<h1><?php echo $post->title; ?></h1>

<p><?php echo $post->content; ?></p>