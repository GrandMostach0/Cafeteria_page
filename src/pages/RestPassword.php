<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Cuenta</title>
    <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../../index.css">
</head>

<body>

    <?php
    include '../components/navBar2.php';
    ?>

    <div class="container-form">
        <form name="formLogin" action="" method="post">
            <h2>Ingresar</h2>
            <p>Le enviaremos un correo electrónico para restablecer su contraseña.</p>

            <div class="envoltura-form">
                <input type="email" name="email" placeholder="Correo electrónico" required>
            </div>

            <button class="btnForm" type="submit">Ingresar</button>

            <a class="ancor-form crear-cuenta" href="./LogIn.php">Cancelar</a>
        </form>
    </div>

    <?php
    include '../components/footer2.php';
    ?>
</body>

</html>