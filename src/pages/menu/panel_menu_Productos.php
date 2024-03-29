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
            <button class="btn-Button">Agregar +</button>
            <br>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID Producto</th>
                    <th>Titulo</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Descuento</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php 
                $usuarios = "SELECT * FROM productos ORDER BY producto_id ASC";
                $resultado = mysqli_query($conectar, $usuarios);

                while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
            <tbody>
                <tr class="contenidoTabla">
                <td><?php echo $row['producto_id'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_title'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_description'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_price'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_offert'] ?>
                    </td>
                    <td>
                        <?php echo $row['producto_category'] ?>
                    </td>
                    <td class="imagenTabla">
                        <img src="<?php echo "../../../" . $row['producto_url'] ?>" </td>
                    <td>
                        <button onclick="eliminarProducto(<?php echo $row['producto_id'] ?>)"
                            class="btn-Button btn-Eliminar">Eliminar</button>
                        <button class="btn-Button btn-Editar">Editar</button>
                    </td>
                </tr>

                <?php
                //liberando los datos
                    }
                    mysqli_free_result($resultado);
                ?>

            </tbody>
            
        </table>

    </div>

    <script src="../../Js/eliminarProducto.js"></script>

</body>

</html>