<?php

namespace App\Models;

use App\Core\Model as Model;

class Member extends Model {

    public function getAll()
    {
        $sql = "SELECT * FROM tb_pelanggan as pelanggan JOIN tb_users as users ON pelanggan.pel_id_user=users.user_id JOIN tb_golongan as golongan ON pelanggan.pel_id_gol=golongan.gol_id ORDER BY pelanggan.pel_nama ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];

        while ($rows = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $data[] = $rows;
        }

        return $data;
    }

    public function getByNo($no)
    {

        $sql = "SELECT * FROM tb_pelanggan as pelanggan JOIN tb_users as users ON pelanggan.pel_id_user=users.user_id JOIN tb_golongan as golongan ON pelanggan.pel_id_gol=golongan.gol_id WHERE pelanggan.pel_no=:pel_no";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":pel_no", $no);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
		$pel_id_user = $data['pel_id_user'];
		$pel_id_gol = $data['pel_id_gol'];
		$pel_no = random_int(100000, 999999); // no random
		$pel_nama = $data['pel_nama'];
		$pel_alamat = $data['pel_alamat'];
		$pel_hp = $data['pel_hp'];
		$pel_ktp = $data['pel_ktp'];
		$pel_seri = $data['pel_seri'];
		$pel_meteran = $data['pel_meteran'];
		$pel_aktif = $data['pel_aktif'];

        // cek no tersedia
        if ($this->cekNo($pel_no)) {
            return "<script>alert('Nomor pelanggan tidak tersedia, silahkan pilih nomor yang lain!');window.location = 'Tambah';</script>";
        } elseif ($this->cekUser($pel_id_user)) {
            return "<script>alert('User sudah punya member, silahkan pilih user yang lain!');window.location = 'Tambah';</script>";
        } else {
            $sql = "INSERT INTO tb_pelanggan 
                    (pel_id_user, pel_id_gol, pel_no, pel_nama, pel_alamat, pel_hp, pel_ktp, pel_seri, pel_meteran, pel_aktif) 
                    VALUES 
                    (:pel_id_user, :pel_id_gol, :pel_no, :pel_nama, :pel_alamat, :pel_hp, :pel_ktp, :pel_seri, :pel_meteran, :pel_aktif)";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":pel_id_user", $pel_id_user);
            $stmt->bindParam(":pel_id_gol", $pel_id_gol);
            $stmt->bindParam(":pel_no", $pel_no);
            $stmt->bindParam(":pel_nama", $pel_nama);
            $stmt->bindParam(":pel_alamat", $pel_alamat);
            $stmt->bindParam(":pel_hp", $pel_hp);
            $stmt->bindParam(":pel_ktp", $pel_ktp);
            $stmt->bindParam(":pel_seri", $pel_seri);
            $stmt->bindParam(":pel_meteran", $pel_meteran);
            $stmt->bindParam(":pel_aktif", $pel_aktif);
            $stmt->execute();
            
            return "<script>alert('Data member berhasil ditambahkan!');window.location = 'Index';</script>";

        }

	}

    public function ubah($data = [])
    {
		$pel_id_gol = $data['pel_id_gol'];
		$pel_nama = $data['pel_nama'];
		$pel_alamat = $data['pel_alamat'];
		$pel_hp = $data['pel_hp'];
		$pel_ktp = $data['pel_ktp'];
		$pel_seri = $data['pel_seri'];
		$pel_meteran = $data['pel_meteran'];
		$pel_aktif = $data['pel_aktif'];
        $pel_id = $data['pel_id'];

        $sql = "UPDATE tb_pelanggan SET 
                pel_id_gol=:pel_id_gol,
                pel_nama=:pel_nama,
                pel_alamat=:pel_alamat,
                pel_hp=:pel_hp,
                pel_ktp=:pel_ktp,
                pel_seri=:pel_seri,
                pel_meteran=:pel_meteran,
                pel_aktif=:pel_aktif
                WHERE pel_id=:pel_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":pel_id_gol", $pel_id_gol);
        $stmt->bindParam(":pel_nama", $pel_nama);
        $stmt->bindParam(":pel_alamat", $pel_alamat);
        $stmt->bindParam(":pel_hp", $pel_hp);
        $stmt->bindParam(":pel_ktp", $pel_ktp);
        $stmt->bindParam(":pel_seri", $pel_seri);
        $stmt->bindParam(":pel_meteran", $pel_meteran);
        $stmt->bindParam(":pel_aktif", $pel_aktif);
        $stmt->bindParam(":pel_id", $pel_id);
        $stmt->execute();

        return  "<script>alert('Data member berhasil diubah!');window.location = 'Index';</script>";
    }

    public function hapus($data = [])
    {
        $pel_id = $data['pel_id'];

        $sql = "DELETE FROM tb_pelanggan WHERE pel_id=:pel_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":pel_id", $pel_id);
        $stmt->execute();

        return "<script>alert('Data member berhasil hapus!');window.location = 'Index';</script>";
    }

    public function cekNo($no)
    {
        // cek no harus unik
        $sql = "SELECT * FROM tb_pelanggan WHERE pel_no=:pel_no";
        $stmt = $this->db->prepare($sql);
		$stmt->bindParam(":pel_no", $no);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    public function cekUser($user_id)
    {
        // cek user harus unik
        $sql = "SELECT * FROM tb_pelanggan WHERE pel_id_user=:pel_id_user";
        $stmt = $this->db->prepare($sql);
		$stmt->bindParam(":pel_id_user", $user_id);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}