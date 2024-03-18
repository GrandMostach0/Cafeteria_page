<nav class="nav-menu">
    <a href="../../index.php">
        <img class="logo_placer" src="../assets/icons/LogoPlaceDelirios.svg" alt="Place And Delirios">
    </a>
    <ul class="menu-options">
        <li class="option">
            <a href="../../#nosotros">Nosotros</a>
        </li>
        <li class="option">
            <a href="../../#productos">Productos</a>
        </li>
        <li class="option">
            <a href="../../#horario">Horario</a>
        </li>
        <li class="option">
            <a href="../../#ubicacion">Ubicacion</a>
        </li>
    </ul>
    <div class="menu-optios-right">
        <img src="../assets/icons/ShopingCar.svg" alt="ShoppingCarIcon">

        <img src="../assets/icons/user.svg" alt="UserIcon">
        <div class="btnSession">
            <?php

                if (isset ($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo '<p style="color: black">Welcome, <strong>' . $username . '</strong></p>';
                    echo '
                    <div class="btn__salir">
                        <a href="../sessionClose.php">Salir</a>
                    </div>';
                } else {
                    echo '<a href="#">Log In / Sing Up</a>';
                }
            ?>
        </div>
    </div>
</nav>