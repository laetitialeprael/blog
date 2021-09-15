<section>
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Mot de passe oublié</h2>
		</div>
		<?php if (isset($_SESSION['message-valid'])): ?>
			<div class="row mb-3">
				<div class="col col-md-8 mx-auto p-3 bg-light text-valid border-valid">
					<p class="m-0"><?php echo $_SESSION['message-valid']; ?></p>
					<?php unset($_SESSION['message-valid']); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($_SESSION['message-error'])): ?>
			<div class="row mb-3">
				<div class="col col-md-8 mx-auto p-3 bg-light text-error border-error">
					<p class="m-0"><?php echo $_SESSION['message-error']; ?></p>
					<?php unset $_SESSION['message-error']; ?>
				</div>
			</div>
		<?php endif; ?>
		<form class="needs-validation" method="post" novalidate>
			<div class="row">
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label" for="inputEmailAdress">Votre email</label>
			    		<input required class="form-control" name="email" type="email" id="inputEmailAdress">
			    		<div class="invalid-feedback"><p>Oops ! Vous devez saisir votre adresse mail.</p></div>
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