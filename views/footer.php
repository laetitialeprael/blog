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
					<li class="nav-item"><a href="/blog/public/uploads/profil-linkedin.pdf" target="_blank" class="nav-link text-white hover-mustard pt-0 ps-0">Télécharger mon CV</a></li>
					<li class="nav-item">
						<a class="nav-link text-white hover-mustard pt-0 ps-0" href="/blog/contact">Contact</a>
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
						<a class="nav-link text-gray hover-mustard pt-0 ps-0" href="/blog/mentions-legales">Mentions légales</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-gray hover-mustard pt-0 ps-0" href="/blog/politique-de-confidentialite">Politiques de confidentialité</a>
					</li>
					<li class="nav-item">
						<a class="nav-link text-gray hover-mustard pt-0 ps-0" href="/blog/cookies">Cookies</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<script src="/blog/public/js/jquery-3-6.js"></script>
<script src="/blog/public/js/owl.carousel.min.js"></script>
<script src="/blog/public/js/bootstrap-form.js"></script>
<script src="/blog/vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
	$('.loop').owlCarousel({
    center: true,
    items:2,
    loop:true,
    nav:true,
    margin:10,
    dots:true,
    autoplay:false,
    autoplayTimeout:5000,
    responsive:{
        600:{
            items:4
        }
    }
});
</script>
</body>