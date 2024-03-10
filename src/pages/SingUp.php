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
        <form name="formLogin" action="./Dashboard.php" method="post">
            <h2>Registrarse</h2>

            <div class="envoltura-form">
                <input type="text" id="name" name="name" placeholder="Nombre">
            </div>
            <div class="envoltura-form">
                <input type="text" id="last_name" name="last_name" placeholder="Apellido">
            </div>
            <div class="envoltura-form">
                <input type="email" id="email" name="email" placeholder="Correo electrónico">
            </div>
            <div class="envoltura-form">
                <input type="password" id="password" name="password" placeholder="contraseña">
            </div>
            <div class="envoltura-form">
                <input type="password" id="confPassword" name="confirmPassword" placeholder="Confirmar Contraseña">
            </div>

            <button class="btnForm" type="button" onclick="valida_envia()" name="Submit">Registrarse</button>
        </form>
    </div>

    <?php
    include '../components/footer2.php';
    ?>

    <script>
        function validateForm() {
            var fields = ['name', 'last_name', 'email', 'password', 'confPassword'];

            for (var i = 0; i < fields.length; i++) {
                var fieldValue = document.getElementById(fields[i]).value.trim();
                if (fieldValue.length === 0) {
                    alert("Campo " + fields[i].toUpperCase() + " vacío");
                    document.getElementById(fields[i]).focus();
                    return false;
                }
            }

            document.formLogin.submit();
            return true;
        }
    </script>
</body>

</html>