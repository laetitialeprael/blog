<h1>Formulaire de création d'un article</h1>

<form method="post">
	
	<div><input type="text" name="title" id="title" placeholder="Saisissez le titre" required /></div>
	
	<div><textarea name="introduction" id="introduction">Introduction de l'article</textarea></div>
	
	<div><textarea name="content" id="content">Contenu de l'article</textarea></div>

	<!-- <div><input type="text" name="category_id_category" id="category" placeholder="1, 2 ou 3" /></div> -->

	<!-- <div><input type="text" name="user_id_user" id="iduser" placeholder="107" /></div> -->
	<label for="category">Choose a car:</label>

	<select name="category_id_category" id="category">
	  <option value="1">Dévellopement</option>
	  <option value="2">Référencement</option>
	  <option value="3">Webdesign</option>
	</select>

	<input type="submit" value="Publier" />
</form>