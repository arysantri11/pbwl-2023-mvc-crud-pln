<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Hapus Member</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="pel_id" value="<?= $data['dataMember']['pel_id'] ?>">
    <table>
        <tr>
            <td>EMAIL USER</td>
            <td><input type="text" name="pel_id_user" value="<?= $data['dataMember']['user_email'] ?>" disabled></td>
        </tr>
        <tr>
            <td>GOLONGAN</td>
            <td>
                <select name="pel_id_gol" disabled>
                    <option value="<?= $data['dataMember']['gol_id'] ?>"><?= $data['dataMember']['gol_nama'] ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>NO MEMBER</td>
            <td><input type="text" name="pel_id_user" value="<?= $data['dataMember']['pel_no'] ?>" disabled></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="pel_nama" value="<?= $data['dataMember']['gol_nama'] ?>" disabled></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>
                <textarea name="pel_alamat" cols="40" rows="5" disabled><?= $data['dataMember']['pel_alamat'] ?></textarea>
            </td>
        </tr>
        <tr>
            <td>HP</td>
            <td><input type="text" name="pel_hp" value="<?= $data['dataMember']['pel_hp'] ?>" disabled></td>
        </tr>
        <tr>
            <td>KTP</td>
            <td><input type="text" name="pel_ktp" value="<?= $data['dataMember']['pel_ktp'] ?>" disabled></td>
        </tr>
        <tr>
            <td>NO SERI</td>
            <td><input type="number" name="pel_seri" min="1" value="<?= $data['dataMember']['pel_seri'] ?>" disabled></td>
        </tr>
        <tr>
            <td>METERAN</td>
            <td><input type="number" name="pel_meteran" min="0" value="<?= $data['dataMember']['pel_meteran'] ?>" disabled></td>
        </tr>
        <tr>
            <td>AKTIF</td>
            <td>
                <select name="pel_aktif" disabled>
                    <option value="<?= $data['dataMember']['pel_aktif'] ?>"><?= $data['dataMember']['pel_aktif'] ?></option>
                </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="btn_delete" value="HAPUS" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?');"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>