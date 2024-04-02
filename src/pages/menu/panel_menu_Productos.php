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
                            '<?php echo $row['producto_category']; ?>'
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

        <div id="myModal" class="modal">
                <div class="modal_content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h3 class="title-modal">Informacion del <strong>Producto</strong></h3>
                    <div class="informacion-img">
                        <div class="informacion-img-container">
                            <img 
                            src="../../assets/images/bebida1.png" 
                            alt="Imagen Aqui">
                        </div>
                        <div class="informacion-img-text">
                            <p class="title-content">Nombre Imagen:</p>
                            <p id="modal_producto_img_name">Bebida1.png</p>
                            <br>
                            <p class="title-content">Cambiar Imagen:</p>
                            <input id="modal_producto_img_file" type="file">
                        </div>
                    </div>
                    <div class="informacion">
                        <div class="informacion-contenido-group">
                            <label for="Producto">Nombre Producto:</label>
                            <input 
                            id="modal_producto_name" 
                            type="text" 
                            placeholder="Nombre Producto"
                            name="Proucto">
                        </div>
                        <div class="informacion-contenido-group">
                            <p class="title-content">Descipcion:</p>
                            <textarea 
                            placeholder="Descripcion del producto"
                            name="descripcion" 
                            id="modal_producto_description"></textarea>
                        </div>
                        <div class="informacion-contenido-group group-price">
                            <!----Precio del producto ----->
                            <div class="contenido-price">
                                <p class="title-content">Precio: </p>
                                <input 
                                id="modal_producto_price"
                                class="content-content" 
                                type="number"
                                placeholder="$10"
                                oninput="actualizarPrecioFinal()">
                            </div>

                            <!----Precio del producto con descuento ----->
                            <div class="contenido-price">
                                <p class="title-content">Descuento: </p>
                                <input 
                                id="modal_producto_offert"
                                class="content-content" 
                                type="number"
                                placeholder="20%"
                                oninput="actualizarPrecioFinal()">
                            </div>

                            <!---- Precio final de venta ----->
                            <div class="contenido-price">
                                <p class="title-content" style="text-align: center;" >Precio Final: </p>
                                <p id="modal_producto_price_final" style="text-align: center;" class="content-content">$100</p>
                            </div>
                        </div>
                        <div class="informacion-contenido-group">
                            <label for="Rol">Categoria:</label>
                            <select name="Rol" id="modal_producto_category">
                                <option value="0">Seleccione</option>
                                <option value="1">Bebidas</option>
                                <option value="2">Cafes</option>
                                <option value="3">Chocolate</option>
                                <option value="4">Frapes</option>
                                <option value="5">Pasteleria</option>
                            </select>
                        </div>
                    </div>
                    <div class="informacion-botones">
                            <button class="btn-Agregar" onclick="#">Guardar</button>
                            <button class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
                        </div>
                </div>
            </div>

    </div>

    <script src="../../Js/eliminarProducto.js"></script>
    <script src="../../Js/modalScript.js"></script>

</body>

</html>