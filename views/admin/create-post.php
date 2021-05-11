<h1>Formulaire de création d'un article</h1>

<form method="post" action="">
	
	<div><input type="text" name="name" id="title" placeholder="Saisissez le titre" required /></div>
	
	<div><textarea name="firstname" id="introduction">Introduction de l'article</textarea></div>
	
	<div><textarea name="email" id="content">Contenu de l'article</textarea></div>
	
	<p>Catégorie<br />
		<input type="checkbox" name="developpement" id="developpement" value="1" />
		<label for="developpement">Développement</label><br />
		
		<input type="checkbox" name="referencement" id="referencement" value="2" />
		<label for="referencement">Référencement</label><br />
		
		<input type="checkbox" name="webdesign" id="webdesign" value="3" />
		<label for="webdesign">Webdesign</label>
	</p>

	<input type="submit" value="Publier" />
</form>