<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Les articles du blog</h2>
			<?php foreach ($result as $post): ?>
				<div class="col-md-6 col-lg-4 py-3">
				<div class="card shadow-sm p-3 h-100">
					<div class="card-body d-flex align-items-start flex-column">
						<div class="mb-auto">
							<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
								<span class="text-capitalize"><?php echo $post->getCategory(); ?></span>
							</div>
							<h5><?php echo $post->getTitle(); ?></h5>
							<p class="mb-0">Par <?php echo $post->viewAuthor(); ?></p>
							<p class="small mt-n1 mb-0"><?php echo $post->getPublishedDate(); ?></p>
							<p class="text-gray current-text"><?php echo $post->viewExtract(); ?></p>
						</div>
						<div class="mt-auto">
							<a class="btn btn-primary rounded-0 position-relative" href="/blog/article/<?php echo $post->viewUrl(); ?>">Lire la suite</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>