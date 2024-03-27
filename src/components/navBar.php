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
        <div class="car">
            <img id="logoCar" src="src/assets/icons/ShopingCar.svg" alt="ShoppingCarIcon">
            <div class="cantidadCar">
                1
            </div>
        </div>
        <img src="src/assets/icons/user.svg" alt="UserIcon">
        <div class="btnSession">
            <?php 

            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                $userRol = $_SESSION['user_rol'];
                if($userRol == 1){
                    echo '<p style="color: black">Welcome, <strong>' . $username . '</strong></p>';
                    echo '
                    <div class="btn__salir">
                        <a href="src/sessionClose.php">Salir</a>
                    </div>';
                }elseif($userRol == 2){
                    echo '<p style="color: black">Welcome, <strong> ' . $username . '</strong></p>';
                    echo '
                    <div class="btn__salir">
                        <a href="src/sessionClose.php">Salir</a>
                        <br>
                    </div>';
                    echo '
                    <div class="btn__salir">
                        <a href="src/pages/menuPagesAdmin.php">Panel Adminstrador</a>
                        <br>
                    </div>';
                }
            }else{
                echo '<a href="src/pages/LogIn.php">Log In / Sing Up</a>';
            }
            ?>
        </div>
        
    </div>
</nav>