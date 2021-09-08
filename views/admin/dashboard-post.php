<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
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
<div class="col px-4">
<section>
	<div class="container">
		<div class="row">
			<h1>Tableau de bord</h1>
		</div>
		<div class="d-flex flex-row border-bottom">
			<div class="h4 border-bottom border-mustard border-4 py-4 mb-0 pointer hover-mustard">Articles</div>
			<a href="#" class="text-dark hover-mustard">
				<div class="h4 ms-4 py-4 mb-0 pointer">Commentaire</div>
			</a>
		</div>
	</div>
</section>
<section class="content pt-0 pb-4">
	<div class="container">
		<div class="row">		
			<h4 class="mb-4">Articles en attente de validation (<?php echo ($count['pending']); ?>)</h4>
		</div>
		<div class="row flex-row overflow-hidden overflow-scroll">
			
			<?php foreach ($result as $post): ?>
				<div class="col-md-6 col-lg-4 mb-4">
					<div class="card shadow-sm p-3 h-100">
						<div class="card-body d-flex align-items-start flex-column">
							<div class="card-meta mb-3 d-flex flex-row align-items-center text-gray current-text">
								<span class="text-capitalize"><?php echo $post->getCategory(); ?></span>
								<span class="text-capitalize"></span>
							</div>
							<h5 class="mb-0"><?php echo $post->getTitle(); ?></h5>
							<p class="mb-0">Par <?php echo $post->viewAuthor(); ?></p>
							<p class="small mb-3"><?php echo $post->getCreationDate(); ?></p>
							<a href="/blog/admin/tableau-de-bord/articles-en-attente-validation/<?php echo $post->viewUrl(); ?>">
								<button type="button" class="btn border border-mustard text-mustard rounded mb-3">Modifier</button>
							</a>
						</div>
						<div class="card-footer">
							<p class="text-center small mb-0 m-auto text-gray">
								<i class="far fa-hourglass me-2"></i><?php echo $post->viewState(); ?>
							</p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>				

		</div>
	</div>
</section>
<section class="content pt-0 pb-4">
	<div class="container">
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