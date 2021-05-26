<h1>Modifier le profil de l'utilisateur</h1><span>Id : <?php echo $_SESSION['iduser']; ?></span>

<form method="POST">
	<p><label for="inputUpdateName">Identifiant</label></p>
	<p><input disabled name="iduser" type="text" id="inputUpdateName" value="<?php echo htmlspecialchars($_SESSION['iduser']); ?>"></p>

	<p><label for="inputUpdateName">Nom</label></p>
	<p><input name="name" type="text" id="inputUpdateName" value="<?php echo htmlspecialchars($_SESSION['name']); ?>"></p>

	<p><label for="inputUdateFirstname">Prénom</label></p>
	<p><input name="firstname" type="text" id="inputUdateFirstname" value="<?php echo htmlspecialchars($_SESSION['firstname']);?>"></p>

	<p><label for="inputUpdateEmailAdress">Email</label></p>
	<p><input name="email" type="email" id="inputUpdateEmailAdress" value="<?php echo htmlspecialchars($_SESSION['email']);?>"></p>
	<!--
	<label for="inputPassword">Votre mot de passe</label>
	<input required name="user_password" type="password" id="inputPassword">
	-->

	<button type="submit">Enregistrer les modifications</button>
</form>