<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Edit User</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="user_id" value="<?= $data['dataUser']['user_id'] ?>">
    <table>
        <tr>
            <td>EMAIL</td>
            <td><input type="email" name="user_email" value="<?= $data['dataUser']['user_email'] ?>" required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="text" name="user_password" value="<?= $data['dataUser']['user_password'] ?>" required></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="user_nama" value="<?= $data['dataUser']['user_nama'] ?>" required></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td><textarea name="user_alamat" id="" cols="30" rows="10"><?= $data['dataUser']['user_alamat'] ?></textarea></td>
        </tr>
        <tr>
            <td>HP</td>
            <td><input type="text" name="user_hp" value="<?= $data['dataUser']['user_hp'] ?>"></td>
        </tr>
        <tr>
            <td>POS</td>
            <td><input type="text" name="user_pos" value="<?= $data['dataUser']['user_pos'] ?>"></td>
        </tr>
        <tr>
            <td>ROLE</td>
            <td>
                <select name="user_role" required>
                    <option value="<?= $data['dataUser']['user_role'] ?>"><?= $data['dataUser']['user_role'] ?></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>AKTIF</td>
            <td>
                <select name="user_aktif" required>
                    <option value="<?= $data['dataUser']['user_aktif'] ?>"><?= $data['dataUser']['user_aktif'] ?></option>
                    <option value="1">1</option>
                    <option value="0">0</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_edit" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>