<form action="<?= URL; ?>/Auth/Proses" method="post" class="form form-login">
        <table cellpadding="5" class="table">
            <tr>
                <td colspan="2" class="text-center text-bold" style="font-size: 30px;">Login</td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" autofocus required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="padding-top: 20px;">
                    <input class="btn-submit" type="submit" name="btn_login" value="LOGIN">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <hr>
                    <p>Belum punya akun? <a href="<?= URL; ?>/Auth/Register">Register sekarang!</a></p>
                </td>
            </tr>
        </table>
        
</form>