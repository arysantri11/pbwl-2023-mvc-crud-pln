<?php

namespace App\Models;

use App\Core\Model as Model;

class Golongan extends Model {

    public function getAll()
    {
        $sql = "SELECT * FROM tb_golongan ORDER BY gol_nama ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function getById($id)
    {

        $sql = "SELECT * FROM tb_golongan WHERE gol_id=:gol_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":gol_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getByKode($kode)
    {

        $sql = "SELECT * FROM tb_golongan WHERE gol_kode=:gol_kode";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":gol_kode", $kode);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
		$gol_kode = 'GOL_' . random_int(10000, 99999);
		$gol_nama = $data['gol_nama'];

        // cek kode tersedia
        if ($this->cekKode($gol_kode)) {
            return "<script>alert('Kode tidak tersedia, silahkan pilih kode yang lain!');window.location = 'Tambah';</script>";
        } else {
            $sql = "INSERT INTO tb_golongan 
                    (gol_kode, gol_nama) VALUES 
                    (:gol_kode, :gol_nama)";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":gol_kode", $gol_kode);
            $stmt->bindParam(":gol_nama", $gol_nama);
            $stmt->execute();
            
            return "<script>alert('Data golongan berhasil ditambahkan!');window.location = 'Index';</script>";

        }

	}

    public function ubah($data = [])
    {
		$gol_nama = $data['gol_nama'];
        $gol_id = $data['gol_id'];

        $sql = "UPDATE tb_golongan SET 
                gol_nama=:gol_nama
                WHERE gol_id=:gol_id";

        $stmt = $this->db->prepare($sql);
		$stmt->bindParam(":gol_nama", $gol_nama);
        $stmt->bindParam(":gol_id", $gol_id);
        $stmt->execute();

        return  "<script>alert('Data golongan berhasil diubah!');window.location = 'Index';</script>";
    }

    public function hapus($data = [])
    {
        $gol_id = $data['gol_id'];

        $sql = "DELETE FROM tb_golongan WHERE gol_id=:gol_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":gol_id", $gol_id);
        $stmt->execute();

        return "<script>alert('Data golongan berhasil hapus!');window.location = 'Index';</script>";
    }

    public function cekKode($kode)
    {
        // cek kode harus unik
        $sql = "SELECT * FROM tb_golongan WHERE gol_kode=:gol_kode";
        $stmt = $this->db->prepare($sql);
		$stmt->bindParam(":gol_kode", $kode);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}