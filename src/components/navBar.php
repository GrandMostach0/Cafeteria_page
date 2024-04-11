<nav class="nav-menu">
    <a href="../../index.php">
        <img class="logo_placer" src="src/assets/icons/LogoPlaceDelirios.svg" alt="Place And Delirios">
    </a>
    <ul class="menu-options">
        <li class="option">
            <a href="#nosotros">Nosotros</a>
        </li>
        <li class="option">
            <a href="#productos">Productos</a>
        </li>
        <li class="option">
            <a href="#horario">Horario</a>
        </li>
        <li class="option">
            <a href="#ubicacion">Ubicacion</a>
        </li>
    </ul>
    <div class="menu-optios-right">
        
        <div id="car" class="car">
            <img id="logoCar" src="src/assets/icons/ShopingCar.svg" alt="ShoppingCarIcon">
            <div class="cantidadCar">
                1
            </div>
        </div>

        <img id="logoUser" src="src/assets/icons/user.svg" alt="UserIcon">
        <div class="dropdown">
            <button class="dropbtn">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $userRol = $_SESSION['user_rol'];
                    echo 'Bienvenido, <strong>' . $username . '</strong>';
                } else {
                     echo 'Log In / Sing Up';
                }
                ?>
            </button>
            <div class="dropdown-content">
                <?php
                    if (isset($_SESSION['username'])) {
                        $userRol = $_SESSION['user_rol'];
                        if ($userRol == 1 || $userRol == 2 || $userRol == 3) {
                            echo '<a href="src/sessionClose.php">Salir</a>';
                        }
                        if ($userRol == 2 || $userRol == 3) {
                            echo '<a href="src/pages/menuPagesAdmin.php">Panel Adminstrador</a>';
                        }
                    } else {
                        echo '<a href="src/pages/LogIn.php">Log In / Sing Up</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</nav>