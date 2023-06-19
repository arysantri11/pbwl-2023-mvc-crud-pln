<?php

namespace App\Controllers;

use App\Core\Controller;

class Member extends Controller
{
	public function __construct()
	{
		// cek login user
		$this->cekLogin();
	}

	public function index()
	{
		$data['nav_aktif'] = "Member";
		$data['dataMember'] = $this->memberModel()->getAll();

		$this->member('member/index', $data);
	}

	public function tambah()
	{
		$data['nav_aktif'] = "Member";
		$data['dataUser'] = $this->userModel()->getAll();
		$data['dataGolongan'] = $this->golonganModel()->getAll();

		$this->member('member/tambah', $data);
	}

	public function edit()
	{
		// mengambil parameter melalui url
		$parameter = $this->getParameter();

		$data['nav_aktif'] = "Member";
		$data['dataUser'] = $this->userModel()->getAll();
		$data['dataGolongan'] = $this->golonganModel()->getAll();
		$data['dataMember'] = $this->memberModel()->getByNo($parameter);

		$this->member('member/edit', $data);
	}

	public function delete()
	{
		// mengambil parameter melalui url
		$parameter = $this->getParameter();

		$data['nav_aktif'] = "Member";
		$data['dataMember'] = $this->memberModel()->getByNo($parameter);

		$this->member('member/delete', $data);
	}

	public function proses()
	{
		if (isset($_POST['btn_simpan'])) {
			echo $this->memberModel()->tambah($_POST);
		} elseif (isset($_POST['btn_edit'])) {
			echo $this->memberModel()->ubah($_POST);
		} elseif (isset($_POST['btn_delete'])) {
			echo $this->memberModel()->hapus($_POST);
		}
		
	}

}
