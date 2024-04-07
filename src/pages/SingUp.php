<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../../index.css">
</head>

<body>
    
    <?php 
    include '../components/navBar2.php';
    ?>
    <div class="container-form form__SingUp">
        <form 
        name="formLogin" 
        action="./registroBD.php" 
        method="post"
        onsubmit="return valida_envia()">
            <h2>Registrarse</h2>

            <div class="envoltura-form">
                <label for="name">Nombre:</label>
                <input type="text" id="name" name="name" placeholder="Nombre" required>
            </div>
            <div class="envoltura-form">
                <label for="last_name">Apellido:</label>
                <input type="text" id="last_name" name="last_name" placeholder="Apellido" required>
            </div>
            <div class="envoltura-form">
                <label for="email">Correo electrónico</label>
                <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
            </div>
            <div class="envoltura-form">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="contraseña" required>
            </div>
            <div class="envoltura-form">
                <label for="confPassword">Confirmar contraseña:</label>
                <input type="password" id="confPassword" name="confirmPassword" placeholder="Confirmar Contraseña" required>
            </div>

            <button 
            class="btnForm" 
            type="submit"
            name="Submit">Registrarse</button>
            
            <a class="crear-cuenta" style="text-align: left" href="./LogIn.php">
                <strong>Volver</strong>
            </a>
        </form>
    </div>

    <?php
    include '../components/footer2.php';
    ?>

    <script>
        function valida_envia() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confPassword').value;

            if (name == '' || email == '' || password == '' || confirmPassword == '') {

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Por favor, completa todos los campos'
                });

                return false;
            }

            return true;
        }
    </script>
</body>
</html>