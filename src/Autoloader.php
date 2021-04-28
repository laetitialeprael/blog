<?php

namespace Src;

/*
 * Class Autoloader
 *
 * @package Src
*/
class Autoloader{

	/*
	 * Enregistrer l'autoloader
	*/
	static function register(){
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}

	/*
	 * Inclure le fichier des class
	 *
	 * @param $class strin le nom de la class à charger
	*/
	static function autoload($class){
		if (strpos($class, __NAMESPACE__ . '\\') === 0){
			// str_replace(search, replace, subject)
			$class = str_replace(__NAMESPACE__ . '\\', '', $class);
			// str_replace(search, replace, subject)
			$class = str_replace('\\', '/', $class);
			// __DIR__ contient le nom du dossier parent, dans notre cas src
			require __DIR__ . '/' . $class . 'php';
		}
	}
}