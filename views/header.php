<header class="navbar-white">
	<div class="navbar-top d-none d-lg-block bg-light">
		<div class="container">
			<div class="d-md-flex justify-content-between align-items-center">
				<div class="d-flex align-items-center justify-content-center">
					<ul class="nav justify-content-center justify-content-md-start">
						<li class="nav-item me-3">
							<a class="navbar-brand text-dark" href="/openclassroomsblog/">OpenclassroomsBlog</a>
						</li>
					</ul>
				</div>
				<div class="d-flex align-items-center justify-content-center">
					<ul class="nav ms-3">
						<li class="nav-item">
							<?php if(empty($_SESSION['user']['iduser'])): ?>
								<a class="nav-link current-text text-dark" href="../blog/connexion"><i class="far fa-user me-2 text-mustard"></i>Connexion</a>
								<a class="nav-link current-text text-dark" href="../blog/creer-un-compte">Créer un compte</a>
							<?php else: ?>
								<a href=""><i class="far fa-user me-2 text-mustard"></i>Mon compte</a>
								<a href="">Déconnexion</a>
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
				<li class="nav-item"><a class="nav-link text-dark" href="/openclassroomsblog/">Accueil</a></li>
				<li class="nav-item"><a class="nav-link text-dark" href="/openclassroomsblog/blog">Blog</a></li>
				<li class="nav-item"><a class="nav-link text-dark" href="/openclassroomsblog/contact">Contact</a></li>
			</ul>
		</div>
	</nav>
</header>
