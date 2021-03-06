<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
  		<div class="card-body px-0">
    		<h5 class="card-title text-center mb-5"><?php echo ($_SESSION['user']['name']); ?> <?php echo (substr($_SESSION['user']['firstname'], 0, 1) . '.'); ?></h5>
    		<?php if ($_SESSION['user']['role'] > 2) : ?>
    		<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
    			<a href="/blog/admin/tableau-de-bord/articles" class="text-dark hover-mustard">Tableau de bord</a>
    		</div>
    		<?php endif; ?>
			<div class="h6 py-3 border rounded-pill mb-3 pointer border-mustard">
				<a href="/blog/admin/mon-compte" class="text-mustard hover-mustard">Mon profil</a>
			</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer">
				<a href="/blog/admin/mes-articles" class="text-dark hover-mustard">Mes articles</a>
			</div>
  		</div>
  		<div class="card-footer">
  			<div class="py-3 pointer m-0">
				<a href="/blog/admin/deconnexion" class="text-dark hover-mustard h6"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a>
			</div>
  		</div>
	</div>
</div>
<div class="col px-4">
<section class="account">
	<div class="container">
		<div class="row border-bottom">
			<div class="col mb-3">
				<h1><?php echo ($_SESSION['user']['name']); ?> <?php echo ($_SESSION['user']['firstname']); ?></h1>
				<p>Membre depuis le <?php echo ($_SESSION['user']['creationDate']); ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<p class="mt-3">Informations personnelles</p>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Nom</p>
  					<p class="text-dark"><?php echo ($_SESSION['user']['name']); ?></p>
				</div>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Prénom</p>
  					<p class="text-dark"><?php echo ($_SESSION['user']['firstname']); ?></p>
				</div>
				<div class="mb-3 border-bottom">
  					<p class="text-gray current-text m-0">Email</p>
  					<p class="text-dark">Email : <?php echo ($_SESSION['user']['email']); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>