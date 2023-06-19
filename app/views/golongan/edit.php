<?php

// var_dump($data);
// die;
?>

<h2 class="judul-halaman">Edit Golongan</h2>

<form action="../Proses" method="post">
    <input type="hidden" name="gol_id" value="<?= $data['dataGolongan']['gol_id'] ?>">
    <table>
        <tr>
            <td>KODE</td>
            <td><input type="text" name="gol_kode" value="<?= $data['dataGolongan']['gol_kode'] ?>" disabled></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="gol_nama" value="<?= $data['dataGolongan']['gol_nama'] ?>" required></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_edit" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>