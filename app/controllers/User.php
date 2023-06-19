<?php

namespace App\Controllers;

use App\Core\Controller;

class User extends Controller
{
	public function __construct()
	{
		// cek login user
		$this->cekLogin();
	}

	public function index()
	{
		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->userModel()->getAll();

		$this->user('user/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->userModel()->getAll();

		$this->user('user/tambah', $data);
	}

	public function edit()
	{
		// mengambil parameter melalui url
		$parameter = $this->getParameter();

		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->userModel()->getByEmail($parameter);

		$this->user('user/edit', $data);
	}

	public function delete()
	{
		// mengambil parameter melalui url
		$parameter = $this->getParameter();

		$data['nav_aktif'] = "User";
		$data['dataUser'] = $this->userModel()->getByEmail($parameter);

		$this->user('user/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			echo $this->userModel()->tambah($_POST);
		} elseif (isset($_POST['btn_edit'])) {
			echo $this->userModel()->ubah($_POST);
		} elseif (isset($_POST['btn_delete'])) {
			echo $this->userModel()->hapus($_POST);
		}
		
	}

}
