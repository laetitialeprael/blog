<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Formulaire de création d'un article</h1>
			</div>
		</div>

		<form method="post">
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
						<label for="title" class="form-label">Saisissez le titre de l'article</label>
			    		<input name="title" type="text" class="form-control" id="title" required>
					</div>
				</div>
				<div class="col col-md-4">
					<div class="mb-3">
						<label for="category" class="form-label">Sélectionner la catégorie de l'article</label>
						<select class="form-select text-capitalize" name="category_id_category" id="category">
							<?php foreach ($categories as $category): ?>
								<option value="<?php echo $category->getIdCategory(); ?>"><?php echo $category->getCategory(); ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
	  					<label for="introduction" class="form-label">Introduction de l'article</label>
	  					<textarea name="introduction" class="form-control" id="introduction" rows="3"></textarea>
					</div>
					<div class="mb-3">
	  					<label for="content" class="form-label">Contenu de l'article</label>
	  					<textarea name="content" class="form-control" id="content" rows="9"></textarea>
					</div>
				</div>
				<div class="col col-md-4">
					<div class="mb-3">
						<label for="formFile" class="form-label">Définir l'image mise en avant</label>
  						<input class="form-control" type="file" id="formFile">
					</div>
					<div class="mb-3">
						<input type="submit" value="Publier" class="btn btn-primary rounded-0" />
					</div>
				</div>
			</div>
			</form>
	</div>
</section>