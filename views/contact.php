<section>
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Contact</h2>
			<p class="text-center current-text mb-4">Tous les champs sont obligatoires</p>
		</div>
		
		<form class="needs-validation" method="post" novalidate>
			<div class="row">
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label" for="inputName">Votre nom</label>
						<input required class="form-control" name="name" type="text" id="inputName">
			    		<div class="invalid-feedback"><p>Oops ! Vous devez saisir votre nom.</p></div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label" for="inputFirstname">Votre prénom</label>
						<input required class="form-control" name="firstname" type="text" id="inputFirstname">
			    		<div class="invalid-feedback">Oops ! Vous devez saisir votre prénom.</div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label" for="inputEmailAdress">Votre email</label>
						<input required class="form-control" name="email" type="email" id="inputEmailAdress">
			    		<div class="invalid-feedback">Oops ! Vous devez saisir votre mail.</div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label" for="inputTextarea">Votre message</label>
						<textarea required class="form-control" name="message" id="inputTextarea" rows="3"></textarea>
			    		<div class="invalid-feedback">Oops ! Vous devez saisir un message.</div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto text-center">
					<div class="mb-3">
						<button class="btn btn-primary rounded-0" type="submit">Envoyer</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>
