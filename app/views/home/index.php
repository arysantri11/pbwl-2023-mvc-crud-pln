<!-- <?php echo $data['row_index']; ?> -->

<h2 class="judul-halaman">Home</h2>

<div class="info">
    Selamat datang, 
    <strong>
        <?php
            if (isset($_SESSION['userLogin'])) {
                echo $_SESSION['userLogin']['user_nama'];
            }
        ?>
    </strong>
</div>