<?php

namespace Src\Controllers;

use Src\Models\UserManager;

/*
 * Class UserController
 *
 * @package Src
*/
class UserController extends Controller{

	public function login(){
		$userModel = new UserManager();
		$user = $userModel->connexion();
		
		require '../views/login.php';
	}


	public function formAccount(){
		
		//$userModel = new UserManager();

		//if(isset($_POST['name'], $_POST['firstname'], $_POST['email']) && ($_POST['name'] != '') && ($_POST['firstname'] != '') && ($_POST['email'] != '')){

		//	$user = $userModel->create($_POST['name'], $_POST['firstname'], $_POST['email']);

		//}

		require '../views/create-account.php';
		
	}
	public function processAccount(){
		$userModel = new UserManager();

		if(isset($_POST['name'], $_POST['firstname'], $_POST['email']) && ($_POST['name'] != '') && ($_POST['firstname'] != '') && ($_POST['email'] != '')){

			$user = $userModel->create($_POST['name'], $_POST['firstname'], $_POST['email']);

		}

		require '../views/account.php';
	}
	public function updateAccount(){
		$userModel = new UserManager();

		if(isset($_POST['name'], $_POST['firstname'], $_POST['email']) && ($_POST['name'] != '') && ($_POST['firstname'] != '') && ($_POST['email'] != '')){

			$user = $userModel->update($_POST['name'], $_POST['firstname'], $_POST['email']);
			require '../views/account.php';

		} else {
			require '../views/update-account.php';
		}
	}

}