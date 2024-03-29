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
            <button onclick="openModalUser()" class="btn-Button btn-Agregar">Agregar +</button>
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

                <tbody>
                    <?php
                        $usuarios = "SELECT * FROM usuarios ORDER BY id_user ASC";
                        $resultado = mysqli_query($conectar, $usuarios);

                        while ($row = mysqli_fetch_assoc($resultado)) {
                    ?>
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
                    
                            <button class="btn-Button btn-Editar" 
                            onclick="openModalUser(
                                '<?php echo $row['user_name']; ?>',
                                '<?php echo $row['user_last_name']; ?>',
                                '<?php echo $row['user_email']; ?>',
                                '<?php echo $row['user_password']; ?>',
                                '<?php echo $row['user_rol'] ?>'
                            )">
                                Editar
                            </button>

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
                    <h3 class="title-modal">Informacion del <strong>Usuario</strong></h3>
                    <div class="informacion">
                        <div class="informacion-contenido-group">
                            <label for="Nombre">Nombre:</label>
                            <input id="modal_nombre" type="text" placeholder="Nombre..." name="Nombre">
                        </div>
                        <div class="informacion-contenido-group">
                            <label for="Apellido">Apellido:</label>
                            <input id="modal_apellido" type="text" placeholder="Apellido..." name="Apellido">
                        </div>
                        <div class="informacion-contenido-group">
                            <label for="Correo">Correo electrónico:</label>
                            <input id="modal_correo" type="email" placeholder="correo@gmail.com" name="Correo">
                        </div>
                        <div class="informacion-contenido-group">
                            <label for="contrasenia">Contraseña:</label>
                            <input id="modal_contrasenia" type="password" placeholder="password..." name="contrasenia">
                        </div>
                        <div class="informacion-contenido-group">
                            <label for="Rol">Rol:</label>
                            <select name="Rol" id="modal_rol">
                                <option value="0">Seleccione</option>
                                <option value="1">Usuario</option>
                                <option value="2">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="informacion-botones">
                            <button class="btn-Agregar">Guardar</button>
                            <button class="btn-Eliminar" onclick="closeModal()">Cancelar</button>
                        </div>
                </div>
            </div>
        
    </div>

    <script src="../../Js/eliminarElemento.js"></script>
    <script src="../../Js/modalScript.js"></script>

</body>

</html>