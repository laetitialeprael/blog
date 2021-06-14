<section class="account">
	<div class="container">
		<div class="row border-bottom">
			<div class="col mb-3">
				<h1><?php echo $_SESSION['user']['name']; ?> <?php echo $_SESSION['user']['firstname']; ?></h1>
				<p>Membre depuis le <?php echo $_SESSION['user']['creationDate']; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="mt-3">Informations personnelles</p>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Nom</p>
  					<p class="text-dark"><?php echo $_SESSION['user']['name']; ?></p>
				</div>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Prénom</p>
  					<p class="text-dark"><?php echo $_SESSION['user']['firstname']; ?></p>
				</div>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Rôle</p>
  					<p class="text-dark"><?php echo $_SESSION['user']['firstname']; ?></p>
				</div>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Email</p>
  					<p class="text-dark">Email : <?php echo $_SESSION['user']['email']; ?></p>
				</div>
			</div>
		</div>
	</div>
</section>

<!--<a href="../blog/modifier-mon-compte">Modifier mes informations</a>-->
<h2>Menu de navigation</h2>
<a href="../blog/admin/nouvel-article">Ajouter un article</a>
<a href="../blog/admin/mes-articles">Mes articles</a>