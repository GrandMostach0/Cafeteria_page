<?php
    session_start();
    // Conexión a la bae de datos
    require '../../conexion.php';

    if(isset($_GET['imageUrl'],
    $_GET['nombreProducto'],
    $_GET['descripcionProducto'],
    $_GET['ofertaProducto'],
    $_GET['precioProducto'],
    $_GET['categoriaProducto'],
    )){

        //obtencion de los datos del producto
        $producto = $_GET['nombreProducto'];
        $descripcion = $_GET['descripcionProducto'];
        $oferta = $_GET['ofertaProducto'];
        $precio = $_GET['precioProducto'];
        $categoria = $_GET['categoriaProducto'];
        $urlImage = $_GET['imageUrl'];

        echo $producto . "<br/>";
        echo $descripcion . "<br/>";
        echo $oferta . "<br/>";
        echo $precio . "<br/>";
        echo $categoria . "<br/>";
        echo $urlImage . "<br/>";

        /*
        //obtencion de la informacion de la imagen
        $file_name = $_FILES['imagen']['name'];

        $sql = 
        "INSERT INTO productos(producto_title, producto_description, producto_offert, producto_price, producto_category, producto_url) VALUES ('$producto', '$descripcion', '$oferta', '$precio', '$categoria', '$urlImage')";
        $stmt = $conectar->prepare($sql);

        $stmt->bind_param("ssiiis", $producto, $descripcion, $oferta, $precio, $categoria, $urlImage);

        //Verificar si el registro fue exitoso
        if($stmt->execute()){
            // Insert existoso
            $_SESSION['actualizacion_exitosa'] = true; // Establecer la variable de sesión
        }else{
            $_SESSION['actualizacion_exitosa'] = false;
        }

        //cerrar la conexion
        $conectar->close();
        header('Location: panel_menu_Productos.php');
        exit;
        */
    } else {
        echo "Faltan parámetros necesarios.";
    }