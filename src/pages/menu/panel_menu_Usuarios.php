<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset ($_SESSION['username']) && (int) $_SESSION['user_rol'] === 2) {
} else {
    header("location: ../../../index.php");
}
$usuarioActual = $_SESSION['id_user'];
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
            <h1>Usuarios Registrados</h1>
            <button onclick="openModal()" class="btn-Button">Agregar +</button>
            <br>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <?php 
                    $usuarios = "SELECT * FROM usuarios ORDER BY id_user ASC";
                    $resultado = mysqli_query($conectar, $usuarios);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                ?>

                <tbody>
                    <tr class="contenidoTabla">

                    <td><?php echo $row['id_user'] ?>
                        </td>
                        <td>
                            <?php echo $row['user_name'] ?>
                        </td>
                        <td>
                            <?php echo $row['user_email'] ?>
                        </td>
                        <td>
                            <?php
                            echo $row['user_rol'] == 2 ? 'Administrador' : 'Usuario';
                            ?>
                        </td>
                        <td>
                            <?php echo $row['user_date_created'] ?>
                        </td>
                    
                        <!---- botones accion registro ---->
                        <td class="td-acciones">
                            <?php
                            //agregando validacion para no autoeliminarse
                            if ($usuarioActual != $row['id_user']) {
                                echo '<button onclick="eliminarElemento(' . $row['id_user'] . ')" class="btn-Button btn-Eliminar" >Eliminar</button>';
                            }
                            ?>
                    
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

            <div id="myModal" class="modal">
                <div class="modal_content">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <h2 id="modal_title">Agregar Usuario</h2>
                    <p id="modal_description">Descripcion</p>
                    <p id="modal_price">Precio</p>
                </div>
            </div>
        
    </div>

    <script src="../../Js/eliminarElemento.js"></script>
    <script src="../../Js/modalScript.js"></script>

</body>

</html>