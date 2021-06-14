<?php if(isset($_SESSION['user']['iduser'])): ?>
<section class="fixed-bottom bg-light py-3">
	<div class="container">
		<div class="row">
			<a class="col-4 pointer hover-mustard text-dark" href="/blog/admin/mon-compte">
				<i class="far fa-user me-2 d-block text-center"></i>
				<span class="d-block text-center current-text">Mon compte</span>
			</a>
			<a class="col-4 pointer hover-mustard text-dark" href="/blog/admin/nouvel-article">
				<i class="far fa-edit me-2 d-block text-center"></i>
				<span class="d-block text-center current-text">Nouvel article</span>
			</a>
			<a class="col-4 pointer hover-mustard text-dark" href="/blog/admin/mes-articles">
				<i class="far fa-user me-2 d-block text-center"></i>
				<span class="d-block text-center current-text">Mes articles</span>
			</a>
		</div>
	</div>
</section>
<?php endif; ?>
<section class="newsletter pt-5 pb-4">
	<div class="container">
		<div class="row">
			<div class="col">
				<h2>Recevez les derniers articles dans votre boite mail</h2>
			</div>
			<div class="col">
				<p class="current-text">Pour recevoir les derniers articles publiés sur OpenclassroomsBlog, il vous suffit simplement de nous laisser votre adresse mail.</p>
				<form>
					<div class="input-group mb-3">
  						<input type="text" class="form-control rounded-0" placeholder="Votre adresse mail" aria-label="Recipient's username" aria-describedby="registration-newsletter">
  						<button class="btn btn-outline-secondary rounded-0" type="button" id="registration-newsletter">S'inscrire</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<footer class="pt-5">
	<div class="container">
		<div class="row">
			<div class="col mb-5">
				<h3 class="mb-4">OpenclassroomsBlog</h3>
				<p class="mb-2 current-text">Site dévellopé avec <i class="far fa-heart"></i> et aussi beaucoup de PHP !</p>
				<div class="d-flex">
					<h6 class="mb-0 align-self-center">Suivez-moi :</h6>
					<div class="align-self-center">
						<a class="ms-2 me-2" href="https://www.linkedin.com/in/laetitialeprael/" target="_blank" rel=noopener><i class="fab fa-linkedin"></i></a><a class="me-2" href="https://www.behance.net/laetitialeprael" target="_blank" rel=noopener><i class="fab fa-behance-square"></i></a><a href="https://github.com/laetitialeprael" target="_blank" rel=noopener><i class="fab fa-github"></i></a>
					</div>
				</div>
			</div>
			<div class="col mb-5">
				<h3 class="mb-4">Mon bureau</h3>
				<p class="mb-2 current-text">Manche, Normandie</p>
				<address class="mb-0 current-text">
  					Mont-Saint-Michel - 50170<br/>
  					T. 00 00 00 00 00
				</address>
			</div>
			<div class="col mb-5">
				<h3 class="mb-4">Liens utiles</h3>
				<ul class="nav current-text">
					<li class="nav-item"><a class="nav-link pt-0 ps-0">Télécharger mon CV</a></li>
					<li class="nav-item">
						<a class="nav-link pt-0 ps-0" href="/blog/contact">Contact</a>
					</li>
					<li class="nav-item">
						<a class="nav-link pt-0 ps-0" href="/blog/devenir-auteur">Devenir auteur</a>
					</li>
				</ul>
			</div>
		</div>

		<div class="row border-top py-4 justify-content-between text-gray current-text">
			<div class="col">
				<p>Openclassroomsblog - <?php echo date("Y"); ?></p>
			</div>
			<div class="col-8">
				<ul class="nav justify-content-end">
					<li class="nav-item">
						<a class="nav-link text-gray pt-0 ps-0" href="/blog/mentions-legales">Mentions légales</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-gray pt-0 ps-0" href="/blog/politique-de-confidentialite">Politiques de confidentialité</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-gray pt-0 ps-0" href="/blog/cookies">Cookies</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-gray pt-0 ps-0" href="/blog/charte-utilisation-blog">Charte d'utilisation du blog</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<script src="/blog/public/js/bootstrap-form.js"></script>