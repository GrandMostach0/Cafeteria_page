<?php
session_start();

if(isset($_SESSION['user_rol']) && $_SESSION['user_rol'] == 2){
    // Conexión a la base de datos
    require '../../conexion.php';

    if (
        isset(
        $_FILES['modal_producto_img_file'],
        $_POST['nombreProducto'],
        $_POST['descripcionProducto'],
        $_POST['ofertaProducto'],
        $_POST['precioProducto'],
        $_POST['categoriaProducto'],
        $_POST['idProducto']
    )
    ) {

        $idProducto = $_POST['idProducto'];

        $nombreProducto = $_POST['nombreProducto'];
        $descripcionProducto = $_POST['descripcionProducto'];
        $ofertaProducto = $_POST['ofertaProducto'];
        $precioProducto = $_POST['precioProducto'];
        $categoriaProducto = $_POST['categoriaProducto'];

        if (!empty($idProducto)) {

            $sqlImg = "SELECT producto_url FROM productos WHERE producto_id = '$idProducto'";
            $resultado2 = mysqli_query($conectar, $sqlImg);

            if ($resultado2) {
                $fila = mysqli_fetch_assoc($resultado2);
                $rutaImagenExistente = $fila['producto_url'];

                // Eliminar la imagen existente
                if (file_exists($rutaImagenExistente)) {
                    $rutaImagenExistente = str_replace("src/", "../../", $rutaImagen);
                    unlink($rutaImagenExistente);
                }

                $directorioDestino = "../../assets/images/";
                // Mover la nueva imagen al directorio de destino
                if (move_uploaded_file($_FILES['modal_producto_img_file']['tmp_name'], $directorioDestino . $_FILES['modal_producto_img_file']['name'])) {
                    // Éxito al mover el archivo, ahora puedes guardar la ruta en la base de datos
                    $rutaImagen = 'src/assets/images/' . $_FILES['modal_producto_img_file']['name'];

                    // EDICION DE DATOS
                    $sql = "UPDATE productos SET producto_title=?, producto_description=?, producto_offert=?, producto_price=?, producto_category=?, producto_url=? WHERE producto_id=?";
                    $stmt = $conectar->prepare($sql);

                    // Enlazar los parámetros y ejecutar la sentencia
                    $stmt->bind_param("ssiiisi", $nombreProducto, $descripcionProducto, $ofertaProducto, $precioProducto, $categoriaProducto, $rutaImagen, $idProducto);
                    $stmt->execute();

                    // Verificar si la actualización fue exitosa
                    if ($stmt->affected_rows > 0) {
                        // Éxito al actualizar en la base de datos
                        $_SESSION['actualizacion_exitosa'] = true;
                    } else {
                        // Error al actualizar en la base de datos
                        $_SESSION['actualizacion_exitosa'] = false;
                    }

                    // Cerrar la conexión
                    $conectar->close();
                    header('Location: panel_menu_Productos.php');
                    exit;
                } else {
                    // EDICION DE DATOS
                    $sql = "UPDATE productos SET producto_title=?, producto_description=?, producto_offert=?, producto_price=?, producto_category=? WHERE producto_id=?";
                    $stmt = $conectar->prepare($sql);

                    // Enlazar los parámetros y ejecutar la sentencia
                    $stmt->bind_param("ssiiii", $nombreProducto, $descripcionProducto, $ofertaProducto, $precioProducto, $categoriaProducto, $idProducto);
                    $stmt->execute();

                    // Verificar si la actualización fue exitosa
                    if ($stmt->affected_rows > 0) {
                        // Éxito al actualizar en la base de datos
                        $_SESSION['actualizacion_exitosa'] = true;
                    } else {
                        // Error al actualizar en la base de datos
                        $_SESSION['actualizacion_exitosa'] = false;
                    }

                    // Cerrar la conexión
                    $conectar->close();
                    header('Location: panel_menu_Productos.php');
                    exit;
                }
            } else {
                // Error en la consulta
                echo "Error: " . mysqli_error($conectar);
            }

        } else {
            //AGREGAR DATOS
            $directorioDestino = "../../assets/images/";

            if (move_uploaded_file($_FILES['modal_producto_img_file']['tmp_name'], $directorioDestino . $_FILES['modal_producto_img_file']['name'])) {
                // Éxito al mover el archivo, ahora puedes guardar la ruta en la base de datos
                $rutaImagen = 'src/assets/images/' . $_FILES['modal_producto_img_file']['name'];

                // Obtener los datos del producto
                $producto = $_POST['nombreProducto'];
                $descripcion = $_POST['descripcionProducto'];
                $oferta = $_POST['ofertaProducto'];
                $precio = $_POST['precioProducto'];
                $categoria = $_POST['categoriaProducto'];

                // Preparar la consulta SQL
                $sql = "INSERT INTO productos(producto_title, producto_description, producto_offert, producto_price, producto_category, producto_url) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conectar->prepare($sql);
                $stmt->bind_param("ssiiis", $producto, $descripcion, $oferta, $precio, $categoria, $rutaImagen);

                // Ejecutar la consulta
                if ($stmt->execute()) {
                    // Éxito al insertar en la base de datos
                    $_SESSION['actualizacion_exitosa'] = true;
                } else {
                    // Error al insertar en la base de datos
                    $_SESSION['actualizacion_exitosa'] = false;
                }

                // Cerrar la conexión
                $conectar->close();
                header('Location: panel_menu_Productos.php');
                exit;

            } else {
                // Error al mover el archivo
                echo "Error al mover el archivo.";
            }

        }
    } else {
        // Faltan parámetros necesarios
        echo "Faltan parámetros necesarios.";
    }
}else{
    $_SESSION['actualizacion_fallida'] = false;
    header('Location: panel_menu_Productos.php');
    exit;
}