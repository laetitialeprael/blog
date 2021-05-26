<h1>Profil de l'utilisateur</h1><span>Id : <?php echo $_SESSION['iduser']; ?></span>
<p>Date de création du compte :<?php echo $_SESSION['creationDate']; ?></p>
<p>Date de la dernière visite :<?php echo $_SESSION['lastVisit']; ?></p>
<p>Nom : <?php echo $_SESSION['name']; ?></p>
<p>Prénom : <?php echo $_SESSION['firstname']; ?></p>
<p>Email : <?php echo $_SESSION['email']; ?></p>

<!--<a href="../blog/modifier-mon-compte">Modifier mes informations</a>-->
<h2>Menu de navigation</h2>
<a href="../blog/admin/nouvel-article">Ajouter un article</a>
<a href="../blog/mes-articles">Mes articles</a>