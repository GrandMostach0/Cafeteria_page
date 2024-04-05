<?php
session_start();
// Conexión a la base de datos
require '../../conexion.php';

if (isset($_FILES['modal_producto_img_file'], $_POST['nombreProducto'], $_POST['descripcionProducto'], 
$_POST['ofertaProducto'], $_POST['precioProducto'], $_POST['categoriaProducto'])) {

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
} else {
    // Faltan parámetros necesarios
    echo "Faltan parámetros necesarios.";
}