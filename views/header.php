<h1>Header</h1>
<?php if(empty($_SESSION['user']['iduser'])): ?>
	<a href="../blog/connexion">Connexion</a>
	<a href="../blog/creer-un-compte">Créer un compte</a>
<?php else: ?>
	<a href="">Déconnexion</a>
<?php endif ?>
