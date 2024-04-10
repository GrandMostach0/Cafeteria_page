<?php
session_start();

if (isset ($_SESSION['username']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 3)) {
} else {
    header("location: ../../index.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administracion</title>

    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../../index.css">
    
</head>

<body>

    <?php
    include '../components/navBar2.php';
    ?>

    <div class="container-form nevegacion_opcion">

        <a class="opciones" href="../../index.php">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" 
                width="54" 
                height="54" 
                viewBox="0 0 24 24" 
                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                <path d="M21.999 8a.997.997 0 0 0-.143-.515L19.147 2.97A2.01 2.01 0 0 0 17.433 2H6.565c-.698 0-1.355.372-1.714.971L2.142 7.485A.997.997 0 0 0 1.999 8c0 1.005.386 1.914 1 2.618V20a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-5h4v5a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-9.382c.614-.704 1-1.613 1-2.618zm-2.016.251A2.002 2.002 0 0 1 17.999 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.219 4h2.214l2.55 4.251zm-9.977-.186L10.818 4h2.361l.813 4.065C13.957 9.138 13.079 10 11.999 10s-1.958-.862-1.993-1.935zM6.565 4h2.214l-.76 3.804.02.004c-.015.064-.04.124-.04.192 0 1.103-.897 2-2 2a2.002 2.002 0 0 1-1.984-1.749L6.565 4zm3.434 12h-4v-3h4v3z"></path>
            </svg>
                
                <h2>Ir a la página Inicial</h2>
            </div>
        </a>

        <a class="opciones" href="./menu/panel_menu.php">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg"
                width="54"
                height="54"
                viewBox="0 0 24 24" 
                style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;">
                    <path d="M4 13h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1zm-1 7a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v4zm10 0a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v7zm1-10h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1h-6a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1z">
                    </path>
                </svg>
                <h2>Ir a la página de Administración</h2>
            </div>
        </a>

    </div>

    <?php
    include '../components/footer2.php';
    ?>

</body>

</html>