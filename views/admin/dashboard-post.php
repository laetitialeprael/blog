<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4 bg-dark-theme">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
		<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
			<img src="/blog/public/images/men-02.jpg" class="card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
		</div>
  		<div class="card-body px-0">
    		<h5 class="card-title text-center mb-5"><?php echo ($_SESSION['user']['name']); ?> <?php echo (substr($_SESSION['user']['firstname'], 0, 1) . '.'); ?></h5>
    		<div class="h6 py-3 border rounded-pill mb-3 pointer mustard border-mustard">
    			<a href="/blog/admin/tableau-de-bord" class="text-mustard hover-mustard">Tableau de bord</a>
    		</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer">
				<a href="/blog/admin/mon-compte" class="text-dark hover-mustard">Mon profil</a>
			</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer">
				<a href="/blog/admin/mes-articles" class="text-dark hover-mustard">Mes articles</a>
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
<section class="bg-dark-theme">
	<div class="container">
		<div class="row">
			<h1>Tableau de bord</h1>
		</div>
		<div class="d-flex flex-row border-bottom">
			<div class="h4 border-bottom border-mustard border-4 py-4 mb-0 pointer hover-mustard">Articles</div>
			<a href="/blog/admin/tableau-de-bord/utilisateurs" class="text-dark hover-mustard">
				<div class="h4 ms-4 py-4 mb-0 pointer">Utilisateurs</div>
			</a>
		</div>
	</div>
</section>
<section class="content pt-0 pb-4 bg-dark-theme">
	<div class="container">
		<div class="row">
			<h4 class="mb-4">Articles en attente de validation (<?php echo ($count); ?>)</h4>
			<div class="loop owl-carousel owl-theme owl-loaded owl-drag">
			  	<div class="owl-stage-outer mb-5">
			  		<div class="owl-stage mb-5">
			  			<?php foreach ($result as $post): ?>
			  			<div class="owl-item">
			  				<div class="item">
			  					<div class="col shadow">
							  		<div class="card p-3 rounded-0 border-0 overflow-hidden">
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
												<button type="button" class="btn btn-primary rounded-0">
													<a class="link-light" href="/blog/article/url-article">Lire la suite</a>
												</button>
											</div>
										</div>
									</div>
							  	</div>
			  				</div>
			  			</div>
			  			<?php endforeach; ?>
			  		</div>
			  	</div>	
			</div>
		</div>
		<div class="row">
			<h4 class="mb-4">Commentaires en attente de validation (0)</h4>
			<div class="table-responsive">
				<table class="table">
	  				<thead class="table-light">
	    				<tr>
	    					<th scope="col">Id</th>
	    					<th scope="col">Commentaire</th>
	    					<th scope="col">Date</th>
	    				</tr>
	 				</thead>
	  				<tbody>
	    				<tr>
	    					<th scope="row">1</th>
	    					<td class="mw-70"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor urna orci. Donec nisi turpis, pulvinar sit amet viverra eget, malesuada eget magna. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Curabitur ac lectus sed lectus maximus tempor. Phasellus nec hendrerit orci. Morbi eleifend, augue ac egestas auctor, neque turpis pellentesque leo, quis fermentum nulla augue in sa...</p><span class="mustard fst-italic text-decoration-underline pointer">Afficher</span></td>
	    					<td>2021-02-24 13:39:30</td>
	    				</tr>
	    				<tr>
	    					<th scope="row">2</th>
	    					<td class="mw-70"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor urna orci. Donec nisi turpis, pulvinar sit amet viverra eget, malesuada eget magna. Vestibulum ante ipsum primis in faucibus orci luctus.</p><span class="mustard fst-italic text-decoration-underline pointer">Afficher</span></td>
	    					<td>2021-02-24 13:39:30</td>
	    				</tr>
	  				</tbody>
				</table>
			</div>
		</div>
	</div>	
</section>
</div>
</div>