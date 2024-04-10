<?php 
session_start(); //Iniciar sessión
if (isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2){
    require '../../../conexion.php';

    if (
        isset(
        $_GET['nombre'],
        $_GET['apellido'],
        $_GET['correo'],
        $_GET['contrasenia'],
        $_GET['rol']
    )
    ) {
        //Obtencion de los datos del usuarios
        $nombre = $_GET['nombre'];
        $apellido = $_GET['apellido'];
        $correo = $_GET['correo'];
        $contrasenia = $_GET['contrasenia'];
        $rol = $_GET['rol'];

        //Preparacion de la sentencia SQL
        $sql = "INSERT INTO usuarios(user_name, user_last_name, user_email, user_password, user_rol) VALUES ('$nombre', '$apellido', '$correo', '$contrasenia', '$rol') ";
        $stmt = $conectar->prepare($sql);

        $stmt->bind_param("ssssi", $nombre, $apellido, $correo, $contrasenia, $rol);

        //Verificar si el registro fue exitoso
        if ($stmt->execute()) {
            // Insert existoso
            $_SESSION['actualizacion_exitosa'] = true; // Establecer la variable de sesión
        } else {
            $_SESSION['actualizacion_exitosa'] = false;
        }

        //cerrar la conexion
        $conectar->close();
        header('Location: ../panel_menu_Usuarios.php');
        exit;
    } else {
        echo "Faltan parámetros necesarios.";
    }
}else{
    echo "No tienes permisos de modificacion";
    $_SESSION['actualizacion_fallida'] = false;
    header('Location: ../panel_menu_Usuarios.php');
    exit;
}
