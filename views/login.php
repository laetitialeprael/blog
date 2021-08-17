<section class="login">
	<div class="container">
		<div class="row">
			<h2 class="text-center mb-4">Connexion</h2>
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
						<label class="form-label" for="inputEmailAdress">Votre email</label>
			    		<input required class="form-control" name="email" type="email" id="inputEmailAdress">
			    		<div class="invalid-feedback"><p>Oops ! Vous devez saisir votre adresse mail.</p></div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto">
					<div class="mb-3 form-group">
						<label class="form-label" for="inputPassword">Votre mot de passe</label>
			    		<input required class="form-control" name="password" type="password" id="inputPassword">
			    		<div class="invalid-feedback">Oops ! Vous devez saisir votre mot de passe.</div>
					</div>
				</div>
				<div class="col col-md-8 mx-auto text-center">
					<div class="mb-3">
						<p>Le token de session : <?php echo $token; ?></p>
						<p>Le token stocké dans le formulaire : <?php echo $token; ?></p>
						<p>Le token time stocké dans le formulaire : <?php echo $_SESSION['token_time']; ?></p>
						<input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>">
						<button class="btn btn-primary rounded-0" type="submit">Connexion</button>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col col-md-8 mx-auto text-center">
				<a class="current-text text-dark hover-mustard" href="/blog/mot-de-passe-oublie">Mot de passe oublié</a>
			</div>
		</div>
	</div>
</section>