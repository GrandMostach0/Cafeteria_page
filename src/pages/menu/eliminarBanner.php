<?php
// Conexión a la bae de datos
require '../../conexion.php';

//Obtencion del  ID del producto
$idBanner = $_POST['idBanner'];

//Primero se eliminara la imagen, si la imagen a sido eliminada correctamente entonces se procedera a eliminar el registro de la base de datos
//obtencion de la imagen
$sql = "SELECT banner_url_img FROM banner WHERE id_banner = '$idBanner'";
$resultado = mysqli_query($conectar, $sql);

if ($resultado) {
    //Obtenemos la ruta de la imagen
    $row = mysqli_fetch_array($resultado);
    $rutaImagen = $row['banner_url_img'];

    // Reemplazar la parte inicial de la ruta de la imagen
    $rutaImagen = str_replace("src/", "../../", $rutaImagen);

    //Eliminacion de la imagen
    if (unlink($rutaImagen)) {
        $eliminar = "DELETE FROM banner WHERE id_banner = '$idBanner'";
        $resultado2 = mysqli_query($conectar, $eliminar);
        if ($resultado2) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'Error al eliminar la imagen';
    }
} else {
    echo 'Error al obtener la información del producto';
}