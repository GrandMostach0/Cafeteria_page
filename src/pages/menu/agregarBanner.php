<?php 
session_start();

//Conexion a la base de datos
require '../../conexion.php';

if(isset($_FILES['modal_banner_img_file'], $_POST['banner_title'], $_POST['banner_description'], $_POST['bannerId'])){

    $idBanner = $_POST['bannerId'];

    $bannerTitle = $_POST['banner_title'];
    $bannerDescription = $_POST['banner_description'];

    echo $idBanner . "<br>";

    if(!empty($idBanner)){
        $sqlImg = "SELECT banner_url_img FROM banner WHERE id_banner = '$idBanner'";
        $resultado2 = mysqli_query($conectar, $sqlImg);

        if ($resultado2) {
            $fila = mysqli_fetch_assoc($resultado2);
            $rutaImagenExistente = $fila['banner_url_img'];

            // Eliminar la imagen existente
            if (file_exists($rutaImagenExistente)) {
                $rutaImagenExistente = str_replace("src/", "../../../", $rutaImagen);
                unlink($rutaImagenExistente);
            }

            $directorioDestino = "../../assets/images/banners/";
            // Mover la nueva imagen al directorio de destino
            if (move_uploaded_file($_FILES['modal_banner_img_file']['tmp_name'], $directorioDestino . $_FILES['modal_banner_img_file']['name'])) {
                // Éxito al mover el archivo, ahora puedes guardar la ruta en la base de datos
                $rutaImagen = 'src/assets/images/banners/' . $_FILES['modal_banner_img_file']['name'];

                // EDICION DE DATOS
                $sql = "UPDATE banner SET banner_title=?, banner_description=?, banner_url_img=? WHERE id_banner=?";
                $stmt = $conectar->prepare($sql);

                // Enlazar los parámetros y ejecutar la sentencia
                $stmt->bind_param("sssi", $bannerTitle, $bannerDescription, $rutaImagen, $idBanner);
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
                header('Location: panel_menu_Banners.php');
                exit;
            } else {
                // EDICION DE DATOS
                $sql = "UPDATE banner SET banner_title=?, banner_description=? WHERE id_banner=?";
                $stmt = $conectar->prepare($sql);

                // Enlazar los parámetros y ejecutar la sentencia
                $stmt->bind_param("ssi", $bannerTitle, $bannerDescription, $idBanner);
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
                header('Location: panel_menu_Banners.php');
                exit;
            }
        } else {
            // Error en la consulta
            echo "Error: " . mysqli_error($conectar);
        }
    }else{
        //AGREGAR DATOS
        $directorioDestino = "../../assets/images/banners/";

        if (move_uploaded_file($_FILES['modal_banner_img_file']['tmp_name'], $directorioDestino . $_FILES['modal_banner_img_file']['name'])) {
            // Éxito al mover el archivo, ahora puedes guardar la ruta en la base de datos
            $rutaImagen = 'src/assets/images/banners/' . $_FILES['modal_banner_img_file']['name'];

            $bannerTitle = $_POST['banner_title'];
            $bannerDescription = $_POST['banner_description'];
            // Preparar la consulta SQL
            $sql = "INSERT INTO banner(banner_title, banner_description, banner_url_img) VALUES (?, ?, ?)";
            $stmt = $conectar->prepare($sql);
            $stmt->bind_param("sss", $bannerTitle, $bannerDescription, $rutaImagen);

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
            header('Location: panel_menu_Banners.php');
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