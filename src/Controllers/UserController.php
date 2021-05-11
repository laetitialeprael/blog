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


	public function createAccount(){
		$userModel = new UserManager();
		$user = $userModel->create();
		
		require '../views/create-account.php';
	}

}