<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4 bg-dark-theme">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
		<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
			<img src="/blog/public/images/men-02.jpg" class="card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
		</div>
  		<div class="card-body px-0">
    		<h5 class="card-title text-center mb-5">Bob B.</h5>
    		<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
    			<a href="/blog/admin/tableau-de-bord" class="text-dark hover-mustard">Tableau de bord</a>
    		</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
				<a href="/blog/admin/mon-compte" class="text-dark hover-mustard">Profil</a>
			</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer border-mustard">
				<a href="/blog/admin/mes-articles" class="text-mustard hover-mustard">Articles</a>
			</div>
  		</div>
  		<div class="card-footer">
  			<div class="py-3 pointer m-0">
				<a href="/blog/admin/deconnexion" class="text-dark hover-mustard h6"><i class="fas fa-sign-out-alt me-2"></i>Déconnexion</a>
			</div>
  		</div>
	</div>
</div>
<div class="col px-4 bg-dark-theme">
<section>
	<div class="container">
		<div class="row">
			<h1>Mes articles</h1>
			<a href="/blog/admin/nouvel-article"><div class="btn border border-mustard">Ajouter un article</div></a>
		</div>
		<div class="d-flex flex-row border-bottom">
				<a href="" class="text-mustard hover-mustard">
					<div class="h4 py-4 mb-0 border-bottom border-mustard border-4 pointer hover-mustard">Tous</div>
				</a>
				<a href="" class="text-dark hover-mustard ms-4">
					<div class="h4 py-4 mb-0 pointer hover-mustard">En attente de validation (<?php echo implode($postPendingValidation); ?>)</div>
				</a>
				<a href="" class="text-dark hover-mustard ms-4">
					<div class="h4 py-4 mb-0 pointer hover-mustard">Publié (<?php echo implode($postPublished); ?>)</div>
				</a>
				<a href="" class="text-dark hover-mustard ms-4">
					<div class="h4 py-4 mb-0 pointer hover-mustard">Corbeille (<?php echo implode($postDraft); ?>)</div>
				</a>
		</div>
	</div>
</section>
<section class="content pt-0 pb-4 bg-dark-theme">
	<div class="container">
		<div class="row">
			
			<?php foreach ($result as $post): ?>
			<div class="col-md-6 col-lg-4 mb-4">
				<div class="card p-3 shadow-sm">
					<div class="card-img position-relative card-element-hover">
						<img src="/blog/public/images/exemple-blog.jpg">
						<div class="card-bodyd-flex align-items-start flex-column">
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
							<p class="text-center small mb-0 m-auto text-gray"><i class="far fa-hourglass me-2"></i><?php echo $post->viewState(); ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

		</div>
		</div>
	</div>
</section>
</div>
</div>