<h2 class="judul-halaman">Tambah Member</h2>

<form action="Proses" method="post">
    <table>
        <tr>
            <td>USER</td>
            <td>
                <select name="pel_id_user" required>
                    <?php
                    foreach ($data['dataUser'] as $row) {
                    ?>
                    <option value="<?= $row['user_id'] ?>"><?= $row['user_email'] ?> - <?= $row['user_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>GOLONGAN</td>
            <td>
                <select name="pel_id_gol" required>
                    <?php
                    foreach ($data['dataGolongan'] as $row) {
                    ?>
                    <option value="<?= $row['gol_id'] ?>"><?= $row['gol_nama'] ?></option>
                    <?php } ?> 
                </select>
            </td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="pel_nama" required></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>
                <textarea name="pel_alamat" cols="40" rows="5"></textarea>
            </td>
        </tr>
        <tr>
            <td>HP</td>
            <td><input type="text" name="pel_hp" required></td>
        </tr>
        <tr>
            <td>KTP</td>
            <td><input type="text" name="pel_ktp" required></td>
        </tr>
        <tr>
            <td>NO SERI</td>
            <td><input type="number" name="pel_seri" min="1" required></td>
        </tr>
        <tr>
            <td>METERAN</td>
            <td><input type="number" name="pel_meteran" min="0" required></td>
        </tr>
        <tr>
            <td>AKTIF</td>
            <td>
                <select name="pel_aktif">
                    <option value="Y">Y</option>
                    <option value="N">N</option>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn-simpan" name="btn_simpan" value="SIMPAN"></td>
        </tr>
    </table>
</form>

<a href="Index" class="btn">Kembali</a>