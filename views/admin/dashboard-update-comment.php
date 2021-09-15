<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
  		<div class="card-body px-0">
    		<h5 class="card-title text-center mb-5"><?php echo ($_SESSION['user']['name']); ?> <?php echo (substr($_SESSION['user']['firstname'], 0, 1) . '.'); ?></h5>
    		<?php if ($_SESSION['user']['role'] > 2) : ?>
    		<div class="h6 py-3 border rounded-pill mb-3 pointer border-mustard">
    			<a href="/blog/admin/tableau-de-bord/articles" class="text-mustard hover-mustard">Tableau de bord</a>
    		</div>
    		<?php endif; ?>
			<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
				<a href="/blog/admin/mon-compte" class="text-dark hover-mustard">Mon profil</a>
			</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
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
			<div class="col">
				<h1>Modifier un commentaire</h1>
			</div>
			<?php if (isset($_SESSION['message-valid'])): ?>
			<div class="row mb-3">
				<div class="col mx-auto p-3 bg-light text-valid border-valid">
					<p class="m-0"><?php echo $_SESSION['message-valid']; ?></p>
					<?php unset($_SESSION['message-valid']); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<form method="post">
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
						<label for="message" class="form-label">Modifier le contenu du commentaire</label>
			    		<textarea required name="message" class="form-control" id="message" rows="9"><?php echo $comment->getMessage(); ?></textarea>
					</div>
					
				</div>
				<div class="col col-md-4">
					<div class="mb-3">
						<p class="form-label">Modifier le statut</p>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status" value="1" id="online" <?php if($comment->getStatus() == 1): ?>checked<?php endif; ?>>
							<label class="form-check-label" for="online">Approuvé</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status" value="0" id="pending" <?php if($comment->getStatus() == 0): ?>checked<?php endif; ?>>
							<label class="form-check-label" for="pending">En attente</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="status" value="2" id="delete" <?php if($comment->getStatus() == 2): ?>checked<?php endif; ?>>
							<label class="form-check-label" for="delete">Corbeille</label>
						</div>
					</div>
					<div class="mb-3">
						<input type="submit" value="Mettre à jour" class="btn btn-primary rounded-0" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="mb-3">
						<p>Auteur.rice</p>
						<p class="current-text mb-0 fw-bold"><?php echo $comment->viewAuthor(); ?></p>
						<p class="current-text text-gray"><?php echo $comment->getDate(); ?></p>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
</div>
</div>