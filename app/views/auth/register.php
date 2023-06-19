<form action="<?= URL; ?>/Auth/Proses" method="post" class="form form-login">
        <table cellpadding="5" class="table">
            <tr>
                <td colspan="2" class="text-center text-bold" style="font-size: 30px;">Form Register</td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="user_email" autofocus required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="user_password" required></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="user_nama" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-top: 20px;">
                    <input class="btn-submit" type="submit" name="btn_register" value="REGISTER">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <hr>
                    <p>Sudah register? <a href="<?= URL; ?>/Auth/Login">Login sekarang!</a></p>
                </td>
            </tr>
        </table>
        
</form>