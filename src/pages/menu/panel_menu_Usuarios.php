<?php
session_start();

// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['username']) && ($_SESSION['user_rol'] == 2 || $_SESSION['user_rol'] == 3)) {
} else {
    header("location: ../../index.php");
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
            <button onclick="openModalUserAdd()" class="btn-Button btn-Agregar">Agregar +</button>
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

                        <td data-label="ID Usuario" class="td-id">
                            <?php echo $row['id_user'] ?>
                        </td>
                        <td data-label="Nombre">
                            <?php echo $row['user_name'] ?>
                        </td>
                        <td data-label="Correo">
                            <?php echo $row['user_email'] ?>
                        </td>
                        <td data-label="Rol">
                            <?php
                            if($row['user_rol'] == 1){
                                echo 'Usuario';
                            }else if($row['user_rol'] == 2){
                                echo 'Administrador';
                            }else{
                                echo 'Invitado';
                            }
                            ?>
                        </td>
                        <td data-label="Fecha">
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
                                '<?php echo $row['user_rol']; ?>',
                                '<?php echo $row['id_user']; ?>'
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

            <!---- agregacion del modal a la pagina ----->
            <?php
                include '../../components/modales/modalUsuarios.php';
            ?>
        
    </div>

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

    <div style="margin-top: 50px;" class="terminacion">
        <p style="align-items: center;">Esta página se hizo con fines practicos y de aprendizaje, por:  <strong>Victor Bernardo Chan Varguez ©</strong></p>
    </div>

    <script src="../../Js/eliminarElemento.js"></script>
    <script src="../../Js/modalScript.js"></script>

</body>

</html>