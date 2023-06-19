<?php

namespace App\Controllers;

use App\Core\Controller;

class Golongan extends Controller
{
	public function __construct()
	{
		// cek login user
		$this->cekLogin();
		
	}

	public function index()
	{
		$data['nav_aktif'] = "Golongan";
		$data['dataGolongan'] = $this->golonganModel()->getAll();

		$this->golongan('golongan/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Golongan";
		$data['dataGolongan'] = $this->golonganModel()->getAll();

		$this->golongan('golongan/tambah', $data);
	}

	public function edit()
	{
		// mengambil parameter melalui url
		$parameter = $this->getParameter();

		$data['nav_aktif'] = "Golongan";
		$data['dataGolongan'] = $this->golonganModel()->getByKode($parameter);

		$this->golongan('golongan/edit', $data);
	}

	public function delete()
	{
		// mengambil parameter melalui url
		$parameter = $this->getParameter();

		$data['nav_aktif'] = "Golongan";
		$data['dataGolongan'] = $this->golonganModel()->getByKode($parameter);

		$this->golongan('golongan/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			echo $this->golonganModel()->tambah($_POST);
		} elseif (isset($_POST['btn_edit'])) {
			echo $this->golonganModel()->ubah($_POST);
		} elseif (isset($_POST['btn_delete'])) {
			echo $this->golonganModel()->hapus($_POST);
		}
		
	}

}
