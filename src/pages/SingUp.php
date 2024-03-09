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
    <div class="header">
        <a href="../../index.php">
            <img src="../assets/icons/LogoPlaceDelirios.svg" alt="logoPlacer">
        </a>
    </div>
    <div class="container-form">
        <form name="formLogin" action="" method="post">
            <h2>Registrarse</h2>

            <div class="envoltura-form">
                <input type="text" name="name" placeholder="Nombre">
            </div>
            <div class="envoltura-form">
                <input type="text" name="last-name" placeholder="Apellido">
            </div>
            <div class="envoltura-form">
                <input type="email" name="email" placeholder="Correo electrónico">
            </div>
            <div class="envoltura-form">
                <input type="password" name="password" placeholder="contraseña">
            </div>
            <div class="envoltura-form">
                <input type="password" name="confirm-password" placeholder="Confirmar Contraseña">
            </div>

            <button class="btnForm" type="submit">Registrarse</button>
        </form>
    </div>

    <?php
    include '../components/footer.php';
    ?>
</body>

</html>