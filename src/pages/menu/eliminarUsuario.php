<?php
    // Conexión a la base de datos
    require '../../conexion.php';

    // Obtener el ID del usuario a eliminar
    $idUsuario = $_POST['idUsuario'];

    // Eliminar el usuario de la base de datos
    $eliminar = "DELETE FROM usuarios WHERE id_user = '$idUsuario'";
    $resultado = mysqli_query($conectar, $eliminar);

    if ($resultado) {
        echo 'success';
    } else {
        echo 'error';
    }