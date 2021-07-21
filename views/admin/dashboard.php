<h1>Tableau de bord</h1>
<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Articles</button>
			    	<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Utilisateurs</button>
			  	</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
			  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			  	<h2>Articles en attente de validation</h2>
			  	<div class="col-md-6 col-lg-4">
			  		<div class="card rounded-0 border-0 h-100 overflow-hidden">
						<div class="card-img position-relative card-element-hover">
							<img src="/blog/public/images/exemple-blog.jpg">
							<div class="position-absolute top-0 m-4 d-flex">
								<div class="ms-3 my-2 text-start">
									<p class="mb-0 text-white">Par Auteur de l'article</p>
									<p class="small mt-n1 mb-0 text-white">JJ/MM/AAAA</p>
								</div>
							</div>
						</div>
						<div class="card-body py-4 px-0 d-flex align-items-start flex-column">
							<div class="mb-auto">
								<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
									<span class="text-capitalize">CATÉGORIE</span>
								</div>
								<h5>Le titre e l'article</h5>
								<p class="text-gray current-text">Un extrait de l'article</p>
							</div>
							<div class="mt-auto">
								<a class="btn text-dark btn-sm btn-line position-relative" href="/blog/article/url-article ?>">Lire la suite</a>
							</div>
						</div>
					</div>
			  	</div>
			  	<p>Ici on affiche sous forme de caroussel les articles.</p>
			  	<h2>Articles publiés</h2>
			  	<p>Ici on affiche une simple stat avec un bouton pour voir le blog.</p>
			  </div>
			  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
			</div>	
		</div>
	</div>	
</section>
