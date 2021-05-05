<?php

namespace Src\Controllers;


/*
 * Class PostController
 *
 * @package Src
*/
class PostController{

	public static function showLast(){
		echo 'On montre les 3 derniers articles';
		require '../views/home.php';
	}

	public static function showList(){
		echo 'On montre tous les articles';
		require '../views/archive.php';
	}

	public static function showSingle(){
		echo 'On montre un seul article';
		require '../views/single-post.php';
	}

}