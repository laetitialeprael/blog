<h1>Formulaire de création d'un article</h1>

<form method="post">
	
	<div><input type="text" name="title" id="title" placeholder="Saisissez le titre" required /></div>
	
	<div><textarea name="introduction" id="introduction">Introduction de l'article</textarea></div>
	
	<div><textarea name="content" id="content">Contenu de l'article</textarea></div>

	<div><input type="text" name="category_id_category" id="category" placeholder="1, 2 ou 3" /></div>

	<div><input type="text" name="user_id_user" id="iduser" placeholder="107" /></div>
	
	<p>Catégorie<br />
		<input type="checkbox" name="developpement" id="developpement" value="1" />
		<label for="developpement">Développement 1</label><br />
		
		<input type="checkbox" name="referencement" id="referencement" value="2" />
		<label for="referencement">Référencement 2</label><br />
		
		<input type="checkbox" name="webdesign" id="webdesign" value="3" />
		<label for="webdesign">Webdesign 3</label>
	</p>

	<input type="submit" value="Publier" />
</form>