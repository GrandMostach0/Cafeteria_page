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
        require '../../conexion.php';
    ?>

    

    <div class="container-registrosDatos">
        <div class="opciones-registros">
            <h1>Productos Registrados</h1>
            <button onclick="openModalProductAdd()" class="btn-Button btn-Agregar">Agregar +</button>
            <br>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            
            <tbody>
                <?php
                    $usuarios = "SELECT * FROM productos ORDER BY producto_id ASC";
                    $resultado = mysqli_query($conectar, $usuarios);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                ?>
                <tr class="contenidoTabla">
                    <td>
                        <?php echo $row['producto_id'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_title'] ?>
                    </td>
                    <td class="td-descripcion">
                        <?php echo $row['producto_description'] ?>
                    </td>
                    <td>
                        <?php echo '$' . $row['producto_price'] ?>
                    </td>
                    <td>
                        <?php echo '%' . $row['producto_offert'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_category'] ?>
                    </td>
                    <td class="imagenTabla">
                        <img loading="lazy" src="<?php echo "../../../" . $row['producto_url'] ?>" 
                    </td>
                    <td>
                        <button onclick="eliminarProducto(<?php echo $row['producto_id'] ?>)"
                            class="btn-Button btn-Eliminar">Eliminar</button>
                        <button class="btn-Button btn-Editar"
                        onclick="openModalProduct(
                            '<?php echo $row['producto_url']; ?>',
                            '<?php echo $row['producto_title']; ?>',
                            '<?php echo $row['producto_description']; ?>',
                            '<?php echo $row['producto_price']; ?>',
                            '<?php echo $row['producto_offert']; ?>',
                            '<?php echo $row['producto_category']; ?>',
                            <?php echo $row['producto_id']; ?>
                        )"
                        >Editar</button>
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
            include '../../components/modales/modalProductos.php';
        ?>

    </div>

    <script src="../../Js/eliminarProducto.js"></script>
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
    ?>

    <script>
        // Obtener el modal
        var modal = document.getElementById('myModal');
        
        // Obtener la imagen y el input file dentro del modal
        var img = modal.querySelector('#imagen');
        var nameImg = modal.querySelector('#modal_producto_img_name');
        var inputFile = modal.querySelector('#modal_producto_img_file');
        
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