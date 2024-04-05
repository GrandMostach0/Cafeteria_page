<?php 
    // Conexión a la bae de datos
    require '../../conexion.php';

    //Obtencion del  ID del producto
    $idProducto = $_POST['idProducto'];

    //Primero se eliminara la imagen, si la imagen a sido eliminada correctamente entonces se procedera a eliminar el registro de la base de datos
    //obtencion de la imagen
    $sql = "SELECT producto_url FROM productos WHERE producto_id = '$idProducto'";
    $resultado = mysqli_query($conectar, $sql);

    if($resultado){
        //Obtenemos la ruta de la imagen
        $row = mysqli_fetch_array($resultado);
        $rutaImagen = $row['producto_url'];

        // Reemplazar la parte inicial de la ruta de la imagen
        $rutaImagen = str_replace("src/", "../../", $rutaImagen);

        //Eliminacion de la imagen
        if(unlink($rutaImagen)){
            $eliminar = "DELETE FROM productos WHERE producto_id = '$idProducto'";
            $resultado2 = mysqli_query($conectar, $eliminar);

            if($resultado2){
                echo 'success';
            }else{
                echo 'error';
            }
        }else{
            echo 'Error al eliminar la imagen';
            echo $rutaImagen . '<br />';
        }
    }else{
        echo 'Error al obtener la información del producto';
    }