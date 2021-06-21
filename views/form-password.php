<section>
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Réinitialisation de votre mot de passe</h2>
		</div>
		<?php if (isset($_SESSION['message'])): ?>
			<div class="row mb-3">
				<div class="col col-md-8 mx-auto p-3 bg-light text-error border-error">
					<p class="m-0"><?php echo $_SESSION['message']; ?></p>
				</div>
			</div>
		<?php endif; ?>
		<form class="needs-validation" method="post" novalidate>
			<div class="row">
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label"  for="inputPassword">Votre nouveau mot de passe</label>
						<input required class="form-control" name="password" type="password" id="inputPassword">
			    		<div class="invalid-feedback">Oops ! Vous devez saisir votre mot de passe.</div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label"  for="inputValidPassword">Confirmation de votre mot de passe</label>
						<input required class="form-control" name="validpassword" type="password" id="inputValidPassword">
			    		<div class="invalid-feedback">Oops ! Vous devez confirmer votre mot de passe.</div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto text-center">
					<div class="mb-3">
						<button class="btn btn-primary rounded-0" type="submit">Enregistrer</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</section>