<h1>Profil de l'utilisateur</h1>
<p>Date de création du compte :<?php echo $_SESSION['creationDate']; ?></p>
<p>Date de la dernière visite :<?php echo $_SESSION['lastVisit']; ?></p>
<p>Nom : <?php echo $_SESSION['name']; ?></p>
<p>Prénom : <?php echo $_SESSION['firstname']; ?></p>
<p>Email : <?php echo $_SESSION['email']; ?></p>

<a href="../blog/modifier-mon-compte">Modifier mes informations</a>