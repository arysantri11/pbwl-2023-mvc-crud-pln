<nav>
    <ul>
        <li>
            <a href="<?= URL ?>/Home/Index" class="<?= ($data['nav_aktif'] == 'Home') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Home
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/User/Index" class="<?= ($data['nav_aktif'] == 'User') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Users
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Golongan/Index" class="<?= ($data['nav_aktif'] == 'Golongan') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Golongan
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Member/Index" class="<?= ($data['nav_aktif'] == 'Member') ?  'nav-active' : ''?>">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Member
            </a>
        </li>
        <li>
            <a href="<?= URL ?>/Auth/Logout" onclick="return confirm('Yakin ingin logout?');">
                <img class="icon" src="<?= AST; ?>/img/menu.png" alt=""> Logout
            </a>
        </li>
    </ul>
</nav>