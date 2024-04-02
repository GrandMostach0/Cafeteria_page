<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset ($_SESSION['username']) && (int) $_SESSION['user_rol'] === 2) {
} else {
    header("location: ../../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../index.css">
    <link rel="stylesheet" href="../../styles/menu.css">
    <link rel="stylesheet" href="../../styles/registros.css">
</head>

<body>

    <?php
    include '../../components/menu-panel.php';
    ?>

    <div class="container-registrosDatos">
        <div class="opciones-registros">
            <h1>Banners</h1>
            <button class="btn-Button">Agregar +</button>
            <br>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Banner</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr class="contenidoTabla">
                    <td>1</td>
                    <td>Victor</td>
                    <td>kreedlegend0@gmail.com</td>
                    <td>Admin</td>
                    <td>
                        <button class="btn-Button btn-Eliminar">Eliminar</button>
                        <button class="btn-Button btn-Editar" onclick="openModalBanners()">Editar</button>
                    </td>
                </tr>
            </tbody>
        </table>

            <div id="myModal" class="modal">
                <div class="modal_content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h3 class="title-modal">Informacion <strong>Banners</strong></h3>
                    <div class="banner_container">
                        <div class="banner_container_Img">
                            <img 
                            src="../../assets/images/bebida1.png" 
                            alt="Imagen Aqui">

                            <p class="title-content">Nombre Imagen:</p>
                            <p id="modal_producto_img_name">Bebida1.png</p>
                            <br>
                            <p class="title-content">Cambiar Imagen:</p>
                            <input id="modal_producto_img_file" type="file">
                        </div>
                        <div class="informacion-contenido-group banner_container_text">
                            <p class="title-content">Titulo Banner:</p>
                            <input type="text" id="modal_banner_title">
                            <p class="title-content">Descripcion Banner:</p>
                            <textarea class="textDescripcion" name="modal_banner_description" id="banner_description"></textarea>
                        </div>
                    </div>
                    <div class="informacion-botones">
                        <button class="btn-Agregar" onclick="guardarCambios()">Guardar</button>
                        <button class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
                    </div>
                </div>
            </div>
    </div>

    <script src="../../Js/modalScript.js"></script>

</body>

</html>