<h1>Profil de l'utilisateur</h1><span>Id : <?php echo $_SESSION['user']['iduser']; ?></span>
<p>Date de création du compte :<?php echo $_SESSION['user']['creationDate']; ?></p>
<p>Nom : <?php echo $_SESSION['user']['name']; ?></p>
<p>Prénom : <?php echo $_SESSION['user']['firstname']; ?></p>
<p>Email : <?php echo $_SESSION['user']['email']; ?></p>

<!--<a href="../blog/modifier-mon-compte">Modifier mes informations</a>-->
<h2>Menu de navigation</h2>
<a href="../blog/admin/nouvel-article">Ajouter un article</a>
<a href="../blog/admin/mes-articles">Mes articles</a>