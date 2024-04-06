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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <?php
    include '../../components/menu-panel.php';
    ?>

    <div class="container-registrosDatos">
        <div class="opciones-registros">
            <h1>Banners (maximo 5 registros)</h1>
            <button onclick="openModalBannersAdd()" class="btn-Button">Agregar +</button>
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
            <?php
                $usuarios = "SELECT * FROM banner ORDER BY id_banner ASC";
                $resultado = mysqli_query($conectar, $usuarios);

                while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
            <tbody>
                <tr class="contenidoTabla">
                    <td><?php echo $row['id_banner'];?></td>
                    <td><?php echo $row['banner_title'];?></td>
                    <td class="td-descripcion"><?php echo $row['banner_description'];?></td>
                    <td class="imagenTabla">
                        <img
                        loading="lazy"
                        src="<?php echo "../../../" . $row['banner_url_img'] ?>"
                        alt="Imagen Banner">
                    </td>
                    <td>
                        <button onclick="eliminarBanner(<?php echo $row['id_banner']?>)"
                        class="btn-Button btn-Eliminar">Eliminar</button>
                        <button class="btn-Button btn-Editar" onclick="openModalBanners(
                            '<?php echo $row['banner_url_img']; ?>',
                            '<?php echo $row['banner_title']; ?>',
                            '<?php echo $row['banner_description']; ?>',
                            '<?php echo $row['id_banner']; ?>'
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

    <script src="../../Js/eliminarBanner.js"></script>
    <script src="../../Js/modalScript.js"></script>

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