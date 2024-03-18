<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset ($_SESSION['username'])) {
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
            <h1>Productos Registrados</h1>
            <button class="btn-Button">Agregar +</button>
            <br>
        </div>
        <table>
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
            <tr class="contenidoTabla">
                <td>1</td>
                <td>Cafe</td>
                <td>Cafe con leche</td>
                <td>20</td>
                <td>20</td>
                <td>Cafes</td>
                <td>[IMG HERE]</td>
                <td>
                    <button class="btn-Button btn-Eliminar">Eliminar</button>
                    <button class="btn-Button btn-Editar">Editar</button>
                </td>
            </tr>
        </table>

    </div>

</body>

</html>