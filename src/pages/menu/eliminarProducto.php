<?php 
    // Conexión a la bae de datos
    require '../../conexion.php';

    //Obtencion del  ID del producto
    $idProducto = $_POST['idProducto'];

    //Eliminar el producto de la base de datos
    $eliminar = "DELETE FROM productos WHERE producto_id = '$idProducto'";
    $resultado = mysqli_query($conectar, $eliminar);

    if($resultado){
        echo 'success';
    }else{
        echo 'error';
    }