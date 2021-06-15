<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Modifier un article</h1>
			</div>
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
						<select class="form-select" name="category_id_category" id="category">
							<option><?php echo ($post->getCategory()); ?></option>
  							<option value="1">Dévellopement</option>
  							<option value="2">Référencement</option>
  							<option value="3">Webdesign</option>
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