<header class="navbar-white">
	<div class="navbar-top d-none d-lg-block bg-light py-3">
		<div class="container">
			<div class="d-md-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center justify-content-center">
					<ul class="nav justify-content-center justify-content-md-start">
						<li class="nav-item me-3">
							<a class="navbar-brand text-dark" href="/blog/">OpenclassroomsBlog</a>
						</li>
					</ul>
				</div>
				<div class="d-flex align-items-center justify-content-center">
					<ul class="nav ms-3">
						<li class="nav-item">
							<?php if(!isset($_SESSION['user']['iduser'])): ?>
								<a class="current-text text-dark me-3 hover-mustard" href="/blog/connexion">Connexion</a>
								<a class="current-text text-dark hover-mustard" href="/blog/creer-un-compte">Créer un compte</a>
							<?php else: ?>
								<a class="current-text text-dark hover-mustard" href="/blog/admin/deconnexion">Déconnexion</a>
							<?php endif ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="divider-light opacity-1"></div>
	</div>
	<nav class="navbar navbar-expand-lg">
		<div class="container">
			<ul class="navbar-nav navbar-nav-scroll navbar-nav-scroll mx-auto">
				<li class="nav-item"><a class="nav-link text-dark hover-mustard" href="/blog/">Accueil</a></li>
				<li class="nav-item"><a class="nav-link text-dark hover-mustard" href="/blog/article">Blog</a></li>
				<li class="nav-item"><a class="nav-link text-dark hover-mustard" href="/blog/contact">Contact</a></li>
			</ul>
		</div>
	</nav>
</header>
