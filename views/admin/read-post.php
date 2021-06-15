<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<h2 class="text-center">Mes articles</h2>
			<nav class="navbar navbar-expand-lg mb-4">
				<ul class="navbar-nav navbar-nav-scroll navbar-nav-scroll mx-auto">
					<li class="nav-item">
						<span class="nav-link text-dark hover-mustard pointer current-text">En attente de validation (<?php echo implode($postPendingValidation); ?>)</span>
					</li>
					<li class="nav-item">
						<span class="nav-link text-dark hover-mustard pointer current-text">Publié (<?php echo implode($postPublished); ?>)</span>
					</li>
					<li class="nav-item">
						<span class="nav-link text-dark hover-mustard pointer current-text">Corbeille (<?php echo implode($postDraft); ?>)</span>
					</li>
				</ul>
			</nav>
			<?php foreach ($result as $post): ?>
			<div class="col-md-6 col-lg-4">
				<div class="card rounded-0 border-0 h-100 overflow-hidden">
					<div class="card-img position-relative card-element-hover">
						<img src="/blog/public/images/exemple-blog.jpg">
						<div class="card-body py-4 px-0 d-flex align-items-start flex-column">
							<div class="mb-auto">
								<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
									<span class="text-capitalize"><?php echo $post->getCategory(); ?></span>
									<span class="text-uppercase"><?php echo $post->viewState(); ?></span>
								</div>
								<h5><?php echo $post->getTitle(); ?></h5>
								<p class="small mt-n1 mb-0 text-dark"><?php echo $post->getCreationDate(); ?></p>
							</div>
							<div class="mt-auto">
								<a class="btn text-dark btn-sm btn-line position-relative" href="/blog/admin/article/<?php echo $post->viewUrl(); ?>">Modifier</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>