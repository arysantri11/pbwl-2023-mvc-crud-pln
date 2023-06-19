<?php

namespace App\Core;

use App\Models\Member as MemberModels;
use App\Models\User as UserModels;
use App\Models\Golongan as GolonganModels;

class Controller
{

	public function __construct()
	{
		session_start();
	}

	// method untuk mendeklarasikan model
	public function userModel()
	{
		return new UserModels;
	}

	public function golonganModel()
	{
		return new GolonganModels;
	}

	public function memberModel()
	{
		return new MemberModels;
	}

	// method untuk mengambil parameter yang ada di akhir url
	public function getParameter()
	{
		// explode = Membagi string diantara slash
		$url = explode('/', $_GET['page']);

		// end = mengambil data array pada index terakhir
		return end($url);
	}

	// hanya user yg sudah login yg diperbolehkan mengakses halaman yang dituju
	public function cekLogin()
	{
		// jika user belum login maka akan di tendang ke halaman login
		if (!isset($_SESSION['userLogin'])) {
			header('Location:' . URL . '/Auth/Login');
		}
	}

	// hanya user yg belum login yg diperbolehkan mengakses halaman yang dituju
	public function cekGuest()
	{
		// jika user sudah login maka otomatis ditendang ke halaman home
		if (isset($_SESSION['userLogin'])) {
			header('Location:' . URL . '/Home/Index');
		}
	}

	// layout login & register
	public function auth($view, $data = [])
	{
		require_once ROOT . "layouts/auth.php";
	}

	// Layout home
	public function home($view, $data = [])
	{
		$this->cekLogin();
		require_once ROOT . "layouts/dashboard.php";
	}

	// layout user
	public function user($view, $data = [])
	{
		require_once ROOT . "layouts/dashboard.php";
	}

	// layout golongan
	public function golongan($view, $data = [])
	{
		require_once ROOT . "layouts/dashboard.php";
	}

	// layout member
	public function member($view, $data = [])
	{
		require_once ROOT . "layouts/dashboard.php";
	}
}
