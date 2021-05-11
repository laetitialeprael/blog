<?php

namespace Src;

/*
 * Class Form
 * Permet de générer les formulaires
 *
 * @package Src
*/
class Form{
	
	//private $data;

	/*
	 * Génère le formulaire HTML au Controller qui le demande
	 * @return string
	*/
	//public function __construct($data)
	//{
		//$this->data = $data;
	//}

	/*
	 * Génère le champs input
	 * @param string $name Nom du champ
	 * @param strinf $action Action du formulaire
	 * @return Form
	*/
	public function input($name)
	{
		echo '<input type="text" name="' . $name . '" id="title" placeholder="Saisissez le titre" required />';
	}

	/*
	 * Génère les boutons submit
	 * @return Form
	*/
	public function submit($action)
	{
		echo '<button type="submit">' . $action . '</button>';
	}
}