<h1>Profil de l'utilisateur</h1>

<p>Nom : <?php echo $_SESSION['name']; ?></p>
<p>Prénom : <?php echo $_SESSION['firstname']; ?></p>
<p>Email : <?php echo $_SESSION['email']; ?></p>

<a href="../blog/modifier-mon-compte">Modifier mes informations</a>