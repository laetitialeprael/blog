<section class="content pt-5 pb-4">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1>Formulaire de création d'un article</h1>
			</div>
		</div>

		<form class="needs-validation" method="post" novalidate>
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
						<label for="title" class="form-label">Saisissez le titre de l'article</label>
			    		<input required name="title" type="text" class="form-control" id="title">
			    		<div class="invalid-feedback"><p>Oops ! Vous devez saisir un titre pour votre article.</p></div>
					</div>
				</div>
				<div class="col col-md-4">
					<div class="mb-3">
						<label for="category" class="form-label">Sélectionner la catégorie de l'article</label>
						<select required class="form-select text-capitalize" name="category_id_category" id="category">
							<?php foreach ($categories as $category): ?>
								<option value="<?php echo $category->getIdCategory(); ?>"><?php echo $category->getCategory(); ?></option>
							<?php endforeach; ?>
						</select>
						<div class="invalid-feedback"><p>Oops ! Vous devez sélectionner une catégorie pour votre article.</p></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col col-md-8">
					<div class="mb-3">
	  					<label for="introduction" class="form-label">Introduction de l'article (facultatif)</label>
	  					<textarea name="introduction" class="form-control" id="introduction" rows="3"></textarea>
					</div>
					<div class="mb-3">
	  					<label for="content" class="form-label">Contenu de l'article</label>
	  					<textarea required name="content" class="form-control" id="content" rows="9"></textarea>
	  					<div class="invalid-feedback"><p>Oops ! Vous devez rédiger du contenu pour votre article.</p></div>
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