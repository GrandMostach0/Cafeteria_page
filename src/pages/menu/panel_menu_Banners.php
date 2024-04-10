<?php
session_start();

if (isset($_SESSION['username']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 3)) {
} else {
    header("location: ../../index.php");
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    include '../../components/menu-panel.php';
    ?>

    <div class="container-registrosDatos">
        <div class="opciones-registros">
            <h1>Banners (maximo 5 registros)</h1>
                <?php
                $cantidadRegistros = "SELECT COUNT(*) AS cantidad FROM banner";
                $resultado = mysqli_query($conectar, $cantidadRegistros);
                $fila = mysqli_fetch_assoc($resultado);
                $totalRegistros = $fila['cantidad'];
                // Determinar si el botón debe estar habilitado o deshabilitado
                $botonDeshabilitado = ($totalRegistros >= 5) ? 'disabled' : '';
                ?>
                <button onclick="openModalBannersAdd()" class="btn-Button btn-Agregar" <?php echo $botonDeshabilitado; ?> >Agregar+</button>

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
                <?php
                $usuarios = "SELECT * FROM banner ORDER BY id_banner ASC";
                $resultado = mysqli_query($conectar, $usuarios);

                while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr class="contenidoTabla">
                    <td data-label="ID Banner" class="td-id">
                        <?php echo $row['id_banner'];?>
                    </td>
                    <td data-label="Titulo" class="td-title">
                        <?php echo $row['banner_title'];?>
                    </td>
                    <td data-label="Descripcion" class="td-descripcion2">
                    <?php echo $row['banner_description'];?>
                    </td>
                    <td data-label="Imagen" class="imagenTabla">
                        <img
                        loading="lazy"
                        src="<?php echo "../../../" . $row['banner_url_img'] ?>"
                        alt="Imagen Banner">
                    </td>
                    <td class="td-acciones">
                        <button onclick="eliminarBanner(<?php echo $row['id_banner']?>)"
                        class="btn-Button btn-Eliminar">Eliminar</button>
                        <button class="btn-Button btn-Editar" onclick="openModalBanners(
                            '<?php echo $row['banner_url_img']; ?>',
                            '<?php echo $row['banner_title']; ?>',
                            '<?php echo $row['banner_description']; ?>',
                            '<?php echo $row['id_banner']; ?>',
                        )">Editar</button>
                    </td>
                </tr>

                <?php
                //liberando los datos
                }
                mysqli_free_result($resultado);
                ?>
            </tbody>
        </table>

            <?php
                include '../../components/modales/modalBanners.php';
            ?>
    </div>

    <div style="margin-top: 50px;" class="terminacion">
        <p style="align-items: center;">Esta página se hizo con fines practicos y de aprendizaje, por:  <strong>Victor Bernardo Chan Varguez ©</strong></p>
    </div>

    <script src="../../Js/eliminarBanner.js"></script>
    <script src="../../Js/modalScript.js"></script>

     <!---- script para mostar notificaciones ---->
    <?php
    if (isset($_SESSION['actualizacion_exitosa']) && $_SESSION['actualizacion_exitosa'] === true) {
        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Cambios Guardados!',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>";

        // Limpiar la variable de sesión después de mostrar la notificación
        unset($_SESSION['actualizacion_exitosa']);
    }

    if(isset($_SESSION['actualizacion_fallida']) && $_SESSION['actualizacion_fallida'] == false){
        echo "<script>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No tienes permisos!'
                });
            </script>";

        // Limpiar la variable de sesión después de mostrar la notificación
        unset($_SESSION['actualizacion_fallida']);
    }
    ?>

     <script>
        // Obtener el modal
        var modal = document.getElementById('myModal');
        
        // Obtener la imagen y el input file dentro del modal
        var img = modal.querySelector('#modal_banner_img');
        var nameImg = modal.querySelector('#modal_banner_img_name');
        var inputFile = modal.querySelector('#modal_banner_img_file');
        
        // Función para mostrar la imagen seleccionada
        function mostrarImagen() {
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    img.src = e.target.result;
                }
                reader.readAsDataURL(inputFile.files[0]);
                nameImg.textContent = inputFile.files[0].name; // Convierte la imagen a una URL base64
            }
        }

        // Agregar un evento onchange al input file para llamar a la función mostrarImagen cuando cambie
        inputFile.addEventListener('change', mostrarImagen);
    </script>

</body>

</html>