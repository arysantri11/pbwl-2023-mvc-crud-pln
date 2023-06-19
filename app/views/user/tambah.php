<h2 class="judul-halaman">Tambah User</h2>

<form action="Proses" method="post">
    <table>
        <tr>
            <td>EMAIL</td>
            <td><input type="email" name="user_email" autofocus required></td>
        </tr>
        <tr>
            <td>PASSWORD</td>
            <td><input type="text" name="user_password" required></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td><input type="text" name="user_nama" required></td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td><textarea name="user_alamat" id="" cols="30" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>HP</td>
            <td><input type="text" name="user_hp"></td>
        </tr>
        <tr>
            <td>POS</td>
            <td><input type="text" name="user_pos"></td>
        </tr>
        <tr>
            <td>ROLE</td>
            <td>
                <select name="user_role" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>AKTIF</td>
            <td>
                <select name="user_aktif" required>
                    <option value="1">1</option>
                    <option value="0">0</option>
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