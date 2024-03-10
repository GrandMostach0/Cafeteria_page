<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <div class="envoltura-form">
                <input type="email" name="email" placeholder="Correo electrónico" required>
            </div>
            <div class="envoltura-form">
                <input type="password" name="password" placeholder="Contraseña" required>
            </div>

            <a class="ancor-form" href="../../index.php">
                ¿Olvido su contraseña?
            </a>

            <button class="btnForm" type="submit">Ingresar</button>

            <a class="ancor-form crear-cuenta" href="./SingUp.php">Crear Cuenta</a>
        </form>
    </div>

    <?php 
    include '../components/footer2.php';
    ?>
</body>
</html>