<?php

$nombre = $_POST['name'];
$apellido = $_POST['last_name'];
$correo = $_POST['email'];
$contrasenia = $_POST['password'];
$confcontrasenia = $_POST['confirmPassword'];

header("Location: ./LogIn.php");
exit; // Asegúrate de que no haya más código después de la redirección
