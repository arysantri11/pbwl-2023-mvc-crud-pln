</html>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sistem Informasi 3 | <?= $data['nav_aktif'] ?></title>

      <link rel="shortcut icon" href="layouts/assets/img/favicon.ico" type="image/x-icon">
      <link rel="stylesheet" href="<?php echo AST . "/css/style.css"; ?>">
</head>

<body>
    <aside>
        <header>
            <img src="<?= AST; ?>/img/pp-wa.jpg" class="brand">
            <div class="user">
                <?php
                    if (isset($_SESSION['userLogin'])) {
                        echo $_SESSION['userLogin']['user_nama'];
                    }
                ?>
        
            </div>
        </header>
	  	<?php
			require "navbar.php";
		?>

    </aside>

    <main>
        <article>