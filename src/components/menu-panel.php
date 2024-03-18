<header class="menu">
    <a href="./panel_menu.php">
        <img id="logoPlace" src="../../assets/icons/LogoPlaceDelirios.svg" alt="delirios">
    </a>
    <div class="menu-text">
        <a href="../../../index.php">Salir del Panel de Adminstración</a>
        <img src="../../assets/icons/user.svg" alt="usuario">
        <?php 
            
            if(isset ($_SESSION['username'])){
                $username = $_SESSION['username'];

                echo '<p> Bievenido <strong>' . $username . '</strong></p>';
            }
        ?>
    </div>
</header>

<div class="container-menu-opciones">
    <a href="./panel_menu_Usuarios.php" class="opciones">
        <svg data-testid="geist-icon" height="30" stroke-linejoin="round" viewBox="0 0 16 16" width="30"
            style="color: currentcolor;">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M7.75 0C5.95507 0 4.5 1.45507 4.5 3.25V3.75C4.5 5.54493 5.95507 7 7.75 7H8.25C10.0449 7 11.5 5.54493 11.5 3.75V3.25C11.5 1.45507 10.0449 0 8.25 0H7.75ZM6 3.25C6 2.2835 6.7835 1.5 7.75 1.5H8.25C9.2165 1.5 10 2.2835 10 3.25V3.75C10 4.7165 9.2165 5.5 8.25 5.5H7.75C6.7835 5.5 6 4.7165 6 3.75V3.25ZM2.5 14.5V13.1709C3.31958 11.5377 4.99308 10.5 6.82945 10.5H9.17055C11.0069 10.5 12.6804 11.5377 13.5 13.1709V14.5H2.5ZM6.82945 9C4.35483 9 2.10604 10.4388 1.06903 12.6857L1 12.8353V13V15.25V16H1.75H14.25H15V15.25V13V12.8353L14.931 12.6857C13.894 10.4388 11.6452 9 9.17055 9H6.82945Z"
                fill="currentColor">
            </path>
        </svg>
        <div class="opciones-text">
            <h4>Usuarios</h4>
            <p>3</p>
        </div>
    </a>

    <a href="./panel_menu_Productos.php" class="opciones">
        <svg data-testid="geist-icon" height="30" stroke-linejoin="round" viewBox="0 0 16 16" width="30"
            style="color: currentcolor;">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M6.28497 1.5H13V12C13 12.5523 12.5523 13 12 13H6.28497L6.28497 1.5ZM5.03497 1.5H3V12C3 12.5523 3.44772 13 4 13H5.03497L5.03497 1.5ZM5.03497 14.5H4C2.61929 14.5 1.5 13.3807 1.5 12V1.5V0H3H13H14.5V1.5V12C14.5 13.3807 13.3807 14.5 12 14.5H6.28497V15V15.625H5.03497V15V14.5ZM8.505 3.375H9.13H10.13H10.755V4.625H10.13H9.13H8.505V3.375ZM9.13 6.375H8.505V7.625H9.13H10.13H10.755V6.375H10.13H9.13Z"
                fill="currentColor">
            </path>
        </svg>
        <div class="opciones-text">
            <h4>Productos</h4>
            <p>3</p>
        </div>
    </a>

    <a href="" class="opciones">
        <svg data-testid="geist-icon" height="30" stroke-width="1.3" stroke-linejoin="round" viewBox="0 0 16 16"
            width="30" style="color: currentcolor;">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M14.5 2.5H1.5V9.18933L2.96966 7.71967L3.18933 7.5H3.49999H6.63001H6.93933L6.96966 7.46967L10.4697 3.96967L11.5303 3.96967L14.5 6.93934V2.5ZM8.00066 8.55999L9.53034 10.0897L10.0607 10.62L9.00001 11.6807L8.46968 11.1503L6.31935 9H3.81065L1.53032 11.2803L1.5 11.3106V12.5C1.5 13.0523 1.94772 13.5 2.5 13.5H13.5C14.0523 13.5 14.5 13.0523 14.5 12.5V9.06066L11 5.56066L8.03032 8.53033L8.00066 8.55999ZM4.05312e-06 10.8107V12.5C4.05312e-06 13.8807 1.11929 15 2.5 15H13.5C14.8807 15 16 13.8807 16 12.5V9.56066L16.5607 9L16.0303 8.46967L16 8.43934V2.5V1H14.5H1.5H4.05312e-06V2.5V10.6893L-0.0606689 10.75L4.05312e-06 10.8107Z"
                fill="currentColor">
            </path>
        </svg>
        <div class="opciones-text">
            <h4>Portada</h4>
        </div>
    </a>

    <a href="./panel_menu_Banners.php" class="opciones">
        <svg data-testid="geist-icon" height="30" stroke-width="1.3" stroke-linejoin="round" viewBox="0 0 16 16"
            width="30" style="color: currentcolor;">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M14.5 2.5H1.5V9.18933L2.96966 7.71967L3.18933 7.5H3.49999H6.63001H6.93933L6.96966 7.46967L10.4697 3.96967L11.5303 3.96967L14.5 6.93934V2.5ZM8.00066 8.55999L9.53034 10.0897L10.0607 10.62L9.00001 11.6807L8.46968 11.1503L6.31935 9H3.81065L1.53032 11.2803L1.5 11.3106V12.5C1.5 13.0523 1.94772 13.5 2.5 13.5H13.5C14.0523 13.5 14.5 13.0523 14.5 12.5V9.06066L11 5.56066L8.03032 8.53033L8.00066 8.55999ZM4.05312e-06 10.8107V12.5C4.05312e-06 13.8807 1.11929 15 2.5 15H13.5C14.8807 15 16 13.8807 16 12.5V9.56066L16.5607 9L16.0303 8.46967L16 8.43934V2.5V1H14.5H1.5H4.05312e-06V2.5V10.6893L-0.0606689 10.75L4.05312e-06 10.8107Z"
                fill="currentColor">
            </path>
        </svg>
        <div class="opciones-text">
            <h4>Banner</h4>
            <p>3</p>
        </div>
    </a>
</div>