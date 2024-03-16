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
        <form 
        name="formLogin" 
        action="../sessionStart.php"
        method="post">
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
                    <strong>¿Olvido su contraseña?</strong>
                </a>

                <button class="btnForm" type="submit">Ingresar</button>

                <a class="ancor-form crear-cuenta" href="./SingUp.php">
                    No tienes cuenta? <strong>Crear cuenta</strong>
                </a>
            </div>
        </form>
    </div>

    <?php 
    include '../components/footer2.php';
    ?>
</body>
</html>