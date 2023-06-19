<?php

namespace App\Controllers;

use App\Core\Controller;

class Auth extends Controller
{

	public function __construct()
	{
		$this->cekGuest();
	}

	public function login()
	{
		$data['hal_aktif'] = "Login";
		
		$this->auth('auth/login', $data);
	}

	public function register()
	{
		$data['hal_aktif'] = "Register";
		
		$this->auth('auth/register', $data);
	}

	public function logout()
	{
		session_destroy();

		header('Location:' . URL . '/Auth/Login');
	}

	public function proses()
	{
		if (isset($_POST['btn_login'])) {
			echo $this->userModel()->authenticated($_POST['email'], $_POST['password']);
		} elseif (isset($_POST['btn_register'])) {
			echo $this->userModel()->registerasi($_POST);
		}
		
	}
}
