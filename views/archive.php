<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Les articles du blog</h2>
			<?php foreach ($result as $post): ?>
				<div class="col-md-6 col-lg-4">
					<div class="card rounded-0 border-0 h-100 overflow-hidden">
						<div class="card-img position-relative card-element-hover">
							<img src="/blog/public/images/exemple-blog.jpg">
							<div class="position-absolute top-0 m-4 d-flex">
								<div class="ms-3 my-2 text-start">
									<p class="mb-0 text-white">Par <?php echo $post->viewAuthor(); ?></p>
									<p class="small mt-n1 mb-0 text-white"><?php echo $post->getCreationDate(); ?></p>
								</div>
							</div>
						</div>
						<div class="card-body py-4 px-0 d-flex align-items-start flex-column">
							<div class="mb-auto">
								<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
									<span class="text-capitalize"><?php echo $post->getCategory(); ?></span>
								</div>
								<h5><?php echo $post->getTitle(); ?></h5>
								<p class="text-gray current-text"><?php echo $post->viewExtract(); ?></p>
							</div>
							<div class="mt-auto">
								<a class="btn text-dark btn-sm btn-line position-relative" href="#">Lire la suite</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>