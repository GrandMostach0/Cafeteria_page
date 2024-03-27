<?php
require "../conexion.php";

// obtenemos los datos del formulario por POST
$nombre = $_POST['name'];
$apellido = $_POST['last_name'];
$correo = $_POST['email'];
$password = $_POST['password'];

// Insertamos los datos en la base de datos
$insertar = "INSERT INTO usuarios(user_name, user_last_name, user_email, user_password, user_rol) VALUES ('$nombre', '$apellido', '$correo', '$password', '1')";
$query = mysqli_query($conectar, $insertar);

if ($query) {
    // Redirigimos a la página de inicio de sesión con el parámetro 'guardado=true'
    header("Location: ./LogIn.php?guardado=true");
    exit;
} else {
    // Si la consulta falla, redirigimos de nuevo al formulario de registro
    header("Location: ./SingUp.php?error=true");
    exit;
}
?>