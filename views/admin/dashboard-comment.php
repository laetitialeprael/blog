<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
  		<div class="card-body px-0">
    		<h5 class="card-title text-center mb-5"><?php echo ($_SESSION['user']['name']); ?> <?php echo (substr($_SESSION['user']['firstname'], 0, 1) . '.'); ?></h5>
    		<?php if ($_SESSION['user']['role'] > 2) : ?>
    		<div class="h6 py-3 border rounded-pill mb-3 pointer mustard border-mustard">
    			<a href="/blog/admin/tableau-de-bord/articles" class="text-mustard hover-mustard">Tableau de bord</a>
    		</div>
    		<?php endif; ?>
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
			<a href="/blog/admin/tableau-de-bord/articles" class="text-dark hover-mustard">
				<div class="h4 py-4 mb-0 pointer">Articles</div>
			</a>
			<div class="h4 ms-4 border-bottom border-mustard border-4 py-4 mb-0 pointer hover-mustard">Commentaire</div>
		</div>
	</div>
</section>
<section class="content pt-0 pb-4">
	<div class="container">
		<div class="row">		
			<h4 class="mb-4">Commentaires en attente de validation (<?php echo ($count['pending']); ?>)</h4>
		</div>
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
	  				<?php foreach ($result as $comment): ?>
		    			<tr>
		    				<th scope="row"><?php echo $comment->getIdComment(); ?></th>
		    				<td class="mw-70">
		    					<p><?php echo $comment->getMessage(); ?></p>
		    					<a href="/blog/admin/tableau-de-bord/commentaires/<?php echo $comment->getIdComment(); ?>" class="mustard fst-italic text-decoration-underline pointer">Modifier</a>
		    				</td>
		    				<td><?php echo $comment->getDate(); ?></td>
		    			</tr>
	    			<?php endforeach; ?>
	  			</tbody>
			</table>
		</div>
	</div>
</section>
</div>
</div>