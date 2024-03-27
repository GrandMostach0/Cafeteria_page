<?php
session_start();

if (isset ($_SESSION['$username'])) {
    // El usuario ya ha iniciado sesión, redirigirlo al index.php
    header("location: ../../index.php");
    exit; // Terminar la ejecución del script para evitar redireccionamientos adicionales
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../../index.css">

    <?php
    // Verificar si el parámetro 'guardado' está presente en la URL y si es 'true'
    if (isset ($_GET['guardado']) && $_GET['guardado'] === 'true') {
        // Mostrar la notificación de guardado exitoso con SweetAlert2
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: '¡Se han guardado los datos en la base de datos!',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        ";
    }

    // Verificar si el parámetro 'login_success' está presente en la URL y si es 'true'
    if (isset ($_GET['login_success']) && $_GET['login_success'] === 'false') {
        // Mostrar la notificación de error de inicio de sesión con SweetAlert2
        echo "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Credenciales inválidas. Inténtalo de nuevo.',
                        confirmButtonText: 'Aceptar'
                    });
                });
            </script>
        ";
    }
    ?>
</head>

<body>

    <?php
    include '../components/navBar2.php';
    ?>

    <div class="container-form">
        <form name="formLogin" action="../sessionStart.php" method="post">
            <h2>Ingresar</h2>
            <div class="form__container">
                <div class="envoltura-form">
                    <label for="user_email" class="form__label">Correo electrónico: </label>
                    <input type="email" id="user_email" name="user_email" placeholder="Correo electrónico" required>
                </div>
                <div class="envoltura-form">
                    <label for="password" class="form__label">Contraseña: </label>
                    <input type="password" id="password" name="password" placeholder="Contraseña" required>
                </div>

                <a class="ancor-form crear-cuenta" style="text-align: left" href="./RestPassword.php">
                    <strong>¿Olvidó su contraseña?</strong>
                </a>

                <button class="btnForm" type="submit">Ingresar</button>

                <a class="ancor-form crear-cuenta" href="./SingUp.php">
                    ¿No tienes cuenta? <strong>Crear cuenta</strong>
                </a>
            </div>
        </form>
    </div>

    <?php
    include '../components/footer2.php';
    ?>

    <script src="../../Js/notification.js"></script>

</body>

</html>