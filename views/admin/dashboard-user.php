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
<section>
	<div class="container">
		<div class="row">
			<h1>Tableau de bord</h1>
		</div>
		<div class="d-flex flex-row border-bottom">
			<a href="/blog/admin/tableau-de-bord" class="text-dark hover-mustard">
				<div class="h4 py-4 pointer hover-mustard mb-0">Articles</div>
			</a>
			<div class="h4 border-bottom border-mustard border-4 ms-4 py-4 mb-0 pointer">Utilisateurs</div>
		</div>
	</div>
</section>
<section class="content pt-0 pb-4 bg-dark-theme">
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="bg-white px-5 py-4">
					<p class="h1">10</p>
					<p>Total</p>
				</div>
			</div>
			<div class="col-6">
				<div class="bg-white px-5 py-4">
					<p class="h1">2</p>
					<p>En attente</p>
				</div>
			</div>
		</div>
	</div>	
</section>
<section class="pt-0 pb-4">
	<div class="container">
		<h4 class="mb-4">Nouveaux utilisateurs</h4>

		<div class="row justify-content-around mb-4">
			
			<div class="card p-3 shadow-sm" style="width: 18rem;">
				<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
					<img src="/blog/public/images/men-01.jpg" class="card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
				</div>
  				<div class="card-body">
    				<h5 class="card-title text-center">Bob B.</h5>
    				<p class="card-text small text-center">Inscrit depuis le<br/>2021-02-24 13:39:30</p>
    				<p class="text-center small mb-0 text-gray"><i class="far fa-hourglass me-2"></i>En attente</p>
  				</div>
			</div>

			<div class="card p-3 shadow-sm" style="width: 18rem;">
				<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
					<img src="/blog/public/images/lady-01.jpg" class="card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
				</div>
  				<div class="card-body">
    				<h5 class="card-title text-center">Linda B.</h5>
    				<p class="card-text small text-center">Inscrit depuis le<br/>2021-02-24 13:39:30</p>
    				<p class="text-center small mb-0 text-gray"><i class="far fa-hourglass me-2"></i>En attente</p>
  				</div>
			</div>

			<div class="card p-3 shadow-sm" style="width: 18rem;">
				<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
					<img src="/blog/public/images/lady-02.jpg" class="card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
				</div>
  				<div class="card-body">
    				<h5 class="card-title text-center">Tina B.</h5>
    				<p class="card-text small text-center">Inscrit depuis le<br/>2021-02-24 13:39:30</p>
    				<p class="text-center small mb-0 text-gray"><i class="far fa-thumbs-up me-2"></i>Validé</p>
  				</div>
			</div>

		</div>

		<div class="row">
			<div class="col">
				<p class="text-gray small fst-italic text-center">Un utilisateur est considéré "nouveau" pendant 7 jours après la date d'inscription. Au delà de cette date à partir de 14 jours le profil peut être supprimé par l'administrateur.</p>
			</div>
		</div>
	</div>	
</section>
<section class="pt-0 pb-4 position-relative demo">
	<div class="section-icon position-absolute rounded-circle d-flex align-items-center justify-content-center"><i class="fas fa-snowplow"></i></div>
	<div class="container pt-5 border-top">
		<div class="row justify-content-center mb-4">
			<div class="col col-md-8">
				<h4 class="mb-4 text-center">C'est l'heure de cleaner !</h4>
				<p class="text-center">Certains de vos utilisateurs n'ont pas souhaité activer leur compte. Nous vous suggérons de supprimer ces comptes pour libérer de la place dans votre base de donnée.</p>	
			</div>
		</div>

		<div class="row justify-content-around mb-4">
			
			<div class="card p-3 shadow-sm" style="width: 18rem;">
				<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
					<img src="/blog/public/images/men-01.jpg" class="blur card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
				</div>
  				<div class="card-body text-center">
  					<button type="button" class="btn border border-alert bg-alert text-white rounded mb-3"><i class="far fa-trash-alt me-2"></i>Supprimer</button>
    				<p class="card-text small text-center">Inscrit depuis le<br/>2021-02-24 13:39:30</p>
    				<p class="text-center small mb-0 text-gray"><i class="far fa-hourglass me-2"></i>En attente</p>
  				</div>
			</div>

			<div class="card p-3 shadow-sm" style="width: 18rem;">
				<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
					<img src="/blog/public/images/lady-01.jpg" class="blur card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
				</div>
  				<div class="card-body text-center">
  					<button type="button" class="btn border border-alert bg-alert text-white rounded mb-3"><i class="far fa-trash-alt me-2"></i>Supprimer</button>
    				<p class="card-text small text-center">Inscrit depuis le<br/>2021-02-24 13:39:30</p>
    				<p class="text-center small mb-0 text-gray"><i class="far fa-hourglass me-2"></i>En attente</p>
  				</div>
			</div>

		</div>
	</div>	
</section>
<section class="pt-0 pb-4 position-relative">
	<div class="section-icon position-absolute rounded-circle d-flex align-items-center justify-content-center"><i class="fas fa-paper-plane"></i></div>
	<div class="container pt-5 border-top">
		<div class="row align-items-center justify-content-center">
				<div class="col col-md-4 text-center">
					<h4 class="mb-4 h1">Newsletter</h4>
					<p class="h1">8</p>
					<p>Nombre d'abonnés</p>
					<button type="button" class="btn border border-mustard mustard hover-mustard rounded mb-3"><i class="fas fa-file-download me-2"></i>Exporter</button>
				</div>
				<div class="col col-md-5">
					<img src="/blog/public/images/newsletter.svg" class="card-img-top" alt="...">
				</div>
		</div>
	</div>	
</section>
<section class="pt-0 pb-4 position-relative demo">
	<div class="section-icon position-absolute rounded-circle d-flex align-items-center justify-content-center"><i class="fas fa-snowplow"></i></div>
	<div class="container pt-5 border-top">
		<div class="row justify-content-center mb-4">
			<div class="col col-md-8">
				<h4 class="mb-4 text-center">Des utilisateurs souhaitent supprimer leurs données.</h4>
				<p class="text-center">Certains de vos utilisateurs ont fait la demande de suppression de leur donnée. En supprimant les données l'utilisateur est informé qu'il n'aura plus accès à son compte mais les publications (articles et commentaires) resteront affichées avec son prénom et l'initial de son nom.</p>	
			</div>
		</div>

		<div class="table-responsive">
				<table class="table">
	  				<thead class="table-light">
	    				<tr>
	    					<th scope="col">Id</th>
	    					<th scope="col">Utilisateur</th>
	    					<th scope="col">Membre depuis le</th>
	    					<th scope="col">Date de la demande</th>
	    					<th scope="col"></th>
	    				</tr>
	 				</thead>
	  				<tbody>
	    				<tr class="table-white">
	    					<th scope="row">17</th>
	    					<td>Prénom N.</td>
	    					<td>2021-02-24 13:39:30</td>
	    					<td>2021-02-24 13:39:30</td>
	    					<td><i class="far fa-trash-alt me-2 pointer hover-mustard"></i></td>
	    				</tr>
	  				</tbody>
				</table>
		</div>

		</div>
	</div>	
</section>
</div>
</div>