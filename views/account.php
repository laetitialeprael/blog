<h1>Profil de l'utilisateur</h1>

<?php foreach ($result as $user): ?>
		
		<h2><a href="#"><?php echo $user->getName(); ?></a></h2>
		<p><?php echo '' ?></p>
	
	<?php endforeach; ?>

<p>Nom : <?php echo $_POST['name']; ?></p>
<p>Prénom : <?php echo $_POST['firstname']; ?></p>
<p>Email : <?php echo $_POST['email']; ?></p>
<p>Mot de passe : <?php echo $_POST['password']; ?></p>

<a href="../blog/modifier-mon-compte">Modifier mes informations</a>