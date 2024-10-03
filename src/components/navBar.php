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
        <!--icono del carrtio de compras --->
        <div id="cart-icon" onclick="toggleCart()">
            <img id="logoCar" src="src/assets/icons/ShopingCar.svg" alt="ShoppingCarIcon">
            <span id="cart-count">0</span>
        </div>
        
        <!---- [Overlay para cerrar el carrito] ---->
        <div id="cart-overlay" onclick="toggleCart()"></div>
        
        <div class="dropdown">
            <button class="dropbtn">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $userRol = $_SESSION['user_rol'];
                    echo 'Bienvenido, <strong>' . $username . '</strong>';
                } else {
                    echo '<img id="logoUser" src="src/assets/icons/user.svg" alt="UserIcon">';
                    echo 'Iniciar Sesion';
                }
                ?>
            </button>
            <div class="dropdown-content">
                <?php
                    if (isset($_SESSION['username'])) {
                        $userRol = $_SESSION['user_rol'];
                        if ($userRol == 1 || $userRol == 2 || $userRol == 3) {
                            echo '<a href="#" onclick="localStorage.removeItem(\'carrito\'); window.location.href=\'src/sessionClose.php\';">Salir</a>';
                        }
                        if ($userRol == 2 || $userRol == 3) {
                            echo '<a href="src/pages/MenuPagesAdmin.php">Panel Adminstrador</a>';
                        }
                    } else {
                        echo '<a href="src/pages/LogIn.php">Iniciar Sesión</a>';
                    }
                ?>
            </div>
        </div>
    </div>
</nav>