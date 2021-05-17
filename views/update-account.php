<h1>Profil de l'utilisateur</h1>
<p>La page s'affiche si l'utilisateur à réussi la création de son compte</p>

<form method="POST" action="modifier-mon-compte">
	<label for="inputUpdateName"><?php echo $_POST['name']; ?></label>
	<input name="name" type="text" id="inputUpdateName">

	<label for="inputUdateFirstname"><?php echo $_POST['firstname']; ?></label>
	<input name="firstname" type="text" id="inputUdateFirstname">

	<label for="inputUpdateEmailAdress"><?php echo $_POST['email']; ?></label>
	<input name="email" type="email" id="inputUpdateEmailAdress">
	<!--
	<label for="inputPassword">Votre mot de passe</label>
	<input required name="user_password" type="password" id="inputPassword">
	-->

	<button type="submit">Enregistrer les modifications</button>
</form>