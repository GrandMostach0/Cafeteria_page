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
        <img src="src/assets/icons/ShopingCar.svg" alt="ShoppingCarIcon">
        
        <img src="src/assets/icons/user.svg" alt="UserIcon">
        <div class="btnSession">
            <?php 
            session_start();

            if(isset($_SESSION['$username'])){
                $username = $_SESSION['$username'];
                echo '<p style="color: black">Welcome, ' . $username . '</p>';
                echo '<a href="src/sessionClose.php">Salir</a>';
            }else{
                echo '<a href="src/pages/LogIn.php">Log In / Sing Up</a>';
            }
            ?>
        </div>
    </div>
</nav>