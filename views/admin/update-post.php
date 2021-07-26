<div class="d-flex flex-column flex-md-row">
<div class="col col-md-2 text-center flex-column p-4 bg-dark-theme">
	<div class="card p-3 shadow-sm nav-admin position-fixed">
		<div class="card-img card-profil rounded-circle border border-mustard border-4 overflow-hidden m-auto position-relative">
			<img src="/blog/public/images/men-01.jpg" class="card-img-top img-profil position-absolute" alt="Photo de l'utilisateur">
		</div>
  		<div class="card-body px-0">
    		<h5 class="card-title text-center mb-5">Bob B.</h5>
    		<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
    			<a href="/blog/admin/tableau-de-bord" class="text-dark hover-mustard">Tableau de bord</a>
    		</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer hover-mustard">
				<a href="/blog/admin/mon-compte" class="text-dark hover-mustard">Profil</a>
			</div>
			<div class="h6 py-3 border rounded-pill mb-3 pointer border-mustard">
				<a href="/blog/admin/mes-articles" class="text-mustard hover-mustard">Articles</a>
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
<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Modifier un article</h1>
			</div>
			<?php if (isset($_SESSION['message'])): ?>
			<div class="row mb-3">
				<div class="col col-md-8 mx-auto p-3 bg-light text-valid border-valid">
					<p class="m-0"><?php echo $_SESSION['message']; ?></p>
				</div>
			</div>
			<?php endif; ?>
		</div>

		<form method="post">
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
						<label for="title" class="form-label">Titre de l'article</label>
			    		<input name="title" type="text" class="form-control" id="title" required value="<?php echo $post->getTitle(); ?>">
					</div>
				</div>
				<div class="col col-md-4">
					<div class="mb-3">
						<label for="category" class="form-label">Sélectionner la catégorie de l'article</label>
						<select class="form-select text-capitalize" name="category_id_category" id="category">
							<?php foreach ($categories as $category): ?>
									<option <?php if($post->getCategory()): ?>selected<?php endif; ?> value="<?php echo $category->getIdCategory(); ?>"><?php echo $category->getCategory(); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
	  					<label for="introduction" class="form-label">Introduction de l'article</label>
	  					<textarea name="introduction" class="form-control" id="introduction" rows="3"><?php echo $post->getIntroduction(); ?></textarea>
					</div>
					<div class="mb-3">
	  					<label for="content" class="form-label">Contenu de l'article</label>
	  					<textarea name="content" class="form-control" id="content" rows="9"><?php echo $post->getContent(); ?></textarea>
					</div>
				</div>
				<div class="col col-md-4">
					<div class="mb-3">
						<label for="formFile" class="form-label">Définir l'image mise en avant</label>
  						<input class="form-control" type="file" id="formFile">
					</div>
					<div class="mb-3">
						<input type="submit" value="Mettre à jour" class="btn btn-primary rounded-0" />
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
</div>
</div>