<h1>Modifier le profil de l'utilisateur</h1>

<form method="POST">
	<label for="inputUpdateName">Nom</label>
	<input name="name" type="text" id="inputUpdateName" value="<?php echo $_SESSION['name']; ?>">

	<label for="inputUdateFirstname">Prénom</label>
	<input name="firstname" type="text" id="inputUdateFirstname" value="<?php echo $_SESSION['firstname']; ?>">

	<label for="inputUpdateEmailAdress">Adresse mail</label>
	<input name="email" type="email" id="inputUpdateEmailAdress" value="<?php echo $_SESSION['email']; ?>">
	<!--
	<label for="inputPassword">Votre mot de passe</label>
	<input required name="user_password" type="password" id="inputPassword">
	-->

	<button type="submit">Enregistrer les modifications</button>
</form>