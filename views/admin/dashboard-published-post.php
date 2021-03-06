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
			<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
				<a href="/blog/admin/mon-compte" class="text-dark hover-mustard">Mon profil</a>
			</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer border-mustard">
				<a href="/blog/admin/mes-articles" class="text-mustard hover-mustard">Mes articles</a>
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
<section>
	<div class="container">
		<div class="row">
			<h1>Mes articles</h1>
			<a href="/blog/admin/nouvel-article"><div class="btn border border-mustard">Ajouter un article</div></a>
		</div>
		<div class="d-flex flex-row border-bottom">
				<a href="/blog/admin/mes-articles" class="text-dark hover-mustard">
					<div class="h4 py-4 mb-0 pointer hover-mustard">En attente de validation (<?php echo implode($postPendingValidation); ?>)</div>
				</a>
				<a href="/blog/admin/mes-articles/publies" class="text-mustard hover-mustard ms-4">
					<div class="h4 py-4 mb-0 border-bottom border-mustard border-4 pointer hover-mustard">Publié (<?php echo implode($postPublished); ?>)</div>
				</a>
				<a href="/blog/admin/mes-articles/corbeille" class="text-dark hover-mustard ms-4">
					<div class="h4 py-4 mb-0 pointer hover-mustard">Corbeille (<?php echo implode($postDraft); ?>)</div>
				</a>
		</div>
	</div>
</section>
<section class="content pt-0 pb-4">
	<div class="container">
		<div class="row">

			<?php if(implode($postPublished) > 0): ?>
			
				<?php foreach ($result as $post): ?>
				<div class="col-md-6 col-lg-4 mb-4">
					<div class="card p-3 shadow-sm">
						<div class="card-img position-relative card-element-hover">
							<div class="card-body d-flex align-items-start flex-column">
								<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
									<span class="text-capitalize"><?php echo $post->getCategory(); ?></span>
									<span class="text-capitalize"></span>
								</div>
								<h5 class="mb-0"><?php echo $post->getTitle(); ?></h5>
								<p class="small mb-3 text-gray"><?php echo $post->getCreationDate(); ?></p>
								<a href="/blog/admin/mes-articles/<?php echo $post->viewUrl(); ?>">
									<button type="button" class="btn border border-mustard text-mustard rounded mb-3">Modifier</button>
								</a>
							</div>
							<div class="card-footer">

								<p class="text-center small mb-0 m-auto text-gray"><i class="fas fa-check me-2"></i><?php echo $post->viewState(); ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>				
			
			<?php else: ?>

				<div class="col text-center">
					<img src="/blog/public/images/no-result.svg" class="card-img-top card-message" alt="Illustration">
					<h4 class="mb-4">Aucun article de publié pour le moment.</h4>
				</div>

			<?php endif; ?>

		</div>
	</div>
</section>
</div>
</div>