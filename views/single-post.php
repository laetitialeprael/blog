<h1>Single post</h1>

<?php $db = new Src\Database('openclassroomsblog'); ?>

<?php

$post = $db->prepare('SELECT * FROM post WHERE id_post = ?', [$_GET['id_post']], true);

?>
<p><a href="../blog/article">Voir tous les articles</a></p>
<h1><?php echo $post['title']; ?></h1>

<p><?php echo $post['content']; ?></p>