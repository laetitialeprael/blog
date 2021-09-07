<section class="banner"></section>
<section class="introduce text-center text-white position-relative">
	<div class="container-fluid position-absolute top-50 start-50 translate-middle">
		<div class="row">
			<div class="col">
				<h1>Bonjour visiteur.euse,</h1>
				<p>Je m'appelle Laëtitia L., bienvenue sur OpenclassroomsBlog !<br/>Ici on écrit des articles sur les différents domaines de notre métier. On vous parle de dévellopement, de référencement et de design.</p>
				<button type="button" class="btn btn-primary rounded-0">
					<a class="link-light" href="/blog/article">Visiter le blog</a>
				</button>
			</div>
		</div>
	</div>
</section>
<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Les derniers articles du blog</h2>
			<?php foreach ($result as $post): ?>
			<div class="col-md-6 col-lg-4">
				<div class="card shadow-sm p-3 h-100 overflow-hidden">
					<div class="card-body d-flex align-items-start flex-column">
						<div class="mb-auto">
							<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
								<span class="text-capitalize"><?php echo $post->getCategory(); ?></span>
							</div>
							<h5><?php echo $post->getTitle(); ?></h5>
							<p class="mb-0">Par <?php echo $post->viewAuthor(); ?></p>
							<p class="small mt-n1 mb-0"><?php echo $post->getCreationDate(); ?></p>
							<p class="text-gray current-text"><?php echo $post->viewExtract(); ?></p>
						</div>
						<div class="mt-auto">
							<a class="btn btn-primary rounded-0 position-relative" href="#">Lire la suite</a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="row py-4">
			<div class="col text-center">
				<button type="button" class="btn btn-primary rounded-0">
					<a class="link-light" href="/blog/article">Voir tous les articles</a>
				</button>
			</div>
		</div>
	</div>
</section>