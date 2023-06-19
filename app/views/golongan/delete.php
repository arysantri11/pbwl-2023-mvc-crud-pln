<?php

// var_dump($data);
?>

<h2 class="judul-halaman">Hapus Golongan</h2>

<form action="../Proses" method="post">
<input type="hidden" name="gol_id" value="<?= $data['dataGolongan']['gol_id'] ?>">
    <table>
        <tr>
            <td>KODE</td>
            <td><input type="text" name="gol_kode" value="<?= $data['dataGolongan']['gol_kode'] ?>" disabled></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="gol_nama" value="<?= $data['dataGolongan']['gol_nama'] ?>" disabled></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btn_delete" value="HAPUS" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data ini?');"></td>
        </tr>
    </table>
</form>

<a href="../Index" class="btn">Kembali</a>