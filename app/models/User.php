<?php

namespace App\Models;

use App\Core\Model as Model;

class User extends Model {

    public function getAll()
    {
        $sql = "SELECT * FROM tb_users ORDER BY user_email ASC";
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

        $sql = "SELECT * FROM tb_users WHERE user_id=:user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function getByEmail($email)
    {

        $sql = "SELECT * FROM tb_users WHERE user_email=:user_email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_email", $email);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row;
    }

    public function tambah($data = [])
	{
		$user_email = $data['user_email'];
		$user_password = $data['user_password'];
		$user_nama = $data['user_nama'];
		$user_alamat = $data['user_alamat'];
		$user_hp = $data['user_hp'];
		$user_pos = $data['user_pos'];
		$user_role = $data['user_role'];
		$user_aktif = $data['user_aktif'];

        // cek email tersedia
        if ($this->cekEmail($user_email)) {
            return "<script>alert('Email tidak tersedia, silahkan pilih email yang lain!');window.location = 'Tambah';</script>";
        } else {
            $sql = "INSERT INTO tb_users 
                    (user_email, user_password, user_nama, user_alamat, user_hp, user_pos, user_role, user_aktif) VALUES 
                    (:user_email, :user_password, :user_nama, :user_alamat, :user_hp, :user_pos, :user_role, :user_aktif)";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":user_email", $user_email);
            $stmt->bindParam(":user_password", $user_password);
            $stmt->bindParam(":user_nama", $user_nama);
            $stmt->bindParam(":user_alamat", $user_alamat);
            $stmt->bindParam(":user_hp", $user_hp);
            $stmt->bindParam(":user_pos", $user_pos);
            $stmt->bindParam(":user_role", $user_role);
            $stmt->bindParam(":user_aktif", $user_aktif);
            $stmt->execute();
            
            return "<script>alert('Data user berhasil ditambahkan!');window.location = 'Index';</script>";

        }

	}

    public function ubah($data = [])
    {
        $user_email = $data['user_email'];
		$user_password = $data['user_password'];
		$user_nama = $data['user_nama'];
		$user_alamat = $data['user_alamat'];
		$user_hp = $data['user_hp'];
		$user_pos = $data['user_pos'];
		$user_role = $data['user_role'];
		$user_aktif = $data['user_aktif'];
        $user_id = $data['user_id'];

        $sql = "UPDATE tb_users SET 
                user_email=:user_email, 
                user_password=:user_password, 
                user_nama=:user_nama, 
                user_alamat=:user_alamat, 
                user_hp=:user_hp, 
                user_pos=:user_pos, 
                user_role=:user_role, 
                user_aktif=:user_aktif
                WHERE user_id=:user_id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_email", $user_email);
		$stmt->bindParam(":user_password", $user_password);
		$stmt->bindParam(":user_nama", $user_nama);
		$stmt->bindParam(":user_alamat", $user_alamat);
		$stmt->bindParam(":user_hp", $user_hp);
		$stmt->bindParam(":user_pos", $user_pos);
		$stmt->bindParam(":user_role", $user_role);
		$stmt->bindParam(":user_aktif", $user_aktif);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        return  "<script>alert('Data user berhasil diubah!');window.location = 'Index';</script>";
    }

    public function hapus($data = [])
    {
        $user_id = $data['user_id'];

        $sql = "DELETE FROM tb_users WHERE user_id=:user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        return "<script>alert('Data user berhasil hapus!');window.location = 'Index';</script>";
    }

    public function cekEmail($email)
    {
        // cek email harus unik
        $sql = "SELECT * FROM tb_users WHERE user_email=:user_email";
        $stmt = $this->db->prepare($sql);
		$stmt->bindParam(":user_email", $email);
        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    // methode autentikasi email dan password
    public function authenticated($email, $password)
    {
        if ($this->cekEmail($email)) {
            $data = $this->getByEmail($email);

            if ($data['user_password'] == $password) {
                $_SESSION['userLogin'] = $data;
                
                return "<script>alert('Login berhasil!');window.location = '../Home/Index';</script>";
            } else {
                return "<script>alert('Email atau password salah!');window.location = 'Login';</script>";
            }
        } else {
            return "<script>alert('Email atau password salah!');window.location = 'Login';</script>";
        }
    }

    public function registerasi($data)
    {
        $user_email = $data['user_email'];
		$user_password = $data['user_password'];
		$user_nama = $data['user_nama'];
        $user_role = 1; // 1 = user, 2 = admin
        $user_aktif = 1;

        // cek email tersedia
        if ($this->cekEmail($user_email)) {
            return "<script>alert('Email tidak tersedia, silahkan pilih email yang lain!');window.location = 'Register';</script>";
        } else {
            $sql = "INSERT INTO tb_users 
                    (user_email, user_password, user_nama, user_role, user_aktif) VALUES 
                    (:user_email, :user_password, :user_nama, :user_role, :user_aktif)";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":user_email", $user_email);
            $stmt->bindParam(":user_password", $user_password);
            $stmt->bindParam(":user_nama", $user_nama);
            $stmt->bindParam(":user_role", $user_role);
            $stmt->bindParam(":user_aktif", $user_aktif);
            $stmt->execute();
            
            return "<script>alert('Register berhasil, silahhkan login sekarang!');window.location = 'Login';</script>";
        }
    }
}