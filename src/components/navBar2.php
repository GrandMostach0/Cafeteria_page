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
        <img id="logoCar" src="../assets/icons/ShopingCar.svg" alt="ShoppingCarIcon">

        <div class="dropdown">
            <button class="dropbtn">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo '<p style="color: white">Bienvenido, <strong>' . $username . '</strong></p>';
                } else {
                    echo '<img id="logoUser" src="../assets/icons/user.svg" alt="UserIcon">';
                    echo 'Iniciar Sesión';
                }
                ?>
            </button>
            <div class="dropdown-content">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo '
                    <a href="../../index.php">Volver página incial</a>';
                } else {
                    echo '<a href="#">Iniciar Sesion</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>