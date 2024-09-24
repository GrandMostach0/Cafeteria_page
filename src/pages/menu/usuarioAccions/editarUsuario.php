<?php
session_start(); // Iniciar la sesión
if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2){
    require '../../../conexion.php';

    if (isset($_GET['id_user'], $_GET['nombre'], $_GET['apellido'], $_GET['correo'], $_GET['contrasenia'], $_GET['rol'])) {
        // Obtener los datos del usuario del array $_GET
        $id_user = $_GET['id_user'];
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $correo = $_GET['correo'];
        $contrasenia = $_GET['contrasenia'];
        $rol = $_GET['rol'];

        // Preparar la sentencia SQL para actualizar el usuario
        $sql = "UPDATE usuarios SET user_name=?, user_last_name=?, user_email=?, user_password=?, user_rol=? WHERE id_user=?";
        $stmt = $conectar->prepare($sql);

        // Enlazar los parámetros y ejecutar la sentencia
        $stmt->bind_param("ssssii", $nombre, $apellido, $correo, $contrasenia, $rol, $id_user);
        $stmt->execute();

        // Verificar si la actualización fue exitosa
        if ($stmt->affected_rows > 0) {
            // Actualización exitosa
            $_SESSION['actualizacion_exitosa'] = true; // Establecer la variable de sesión
        } else {
            // Error en la actualización
            $_SESSION['actualizacion_exitosa'] = false; // Establecer la variable de sesión
        }

        // Cerrar la conexión
        $conectar->close();

        // Redireccionar de vuelta a la ventana
        header('Location: ../panel_menu_Usuarios.php');
        exit;
    } else {
        echo "Faltan parámetros necesarios.";
    }
}else{
    $_SESSION['actualizacion_fallida'] = false;
    header('Location: ../panel_menu_Usuarios.php');
    exit;
}