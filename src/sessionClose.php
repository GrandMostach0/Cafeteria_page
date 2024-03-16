<?php
session_start();

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión o a cualquier otra página después de cerrar sesión
header("location: ../index.php");
exit; // Asegúrate de que el script se detenga después de la redirección