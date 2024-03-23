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
        require '../../conexion.php';
    ?>

    <div class="container-registrosDatos">
        <div class="opciones-registros">
            <h1>Usuarios Registrados</h1>
            <button class="btn-Button">Agregar +</button>
            <br>
        </div>
        <table>
                <tr>
                    <th>ID Usuario</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
                <?php 
                    $usuarios = "SELECT * FROM usuarios ORDER BY id_user ASC";
                    $resultado = mysqli_query($conectar, $usuarios);

                    while ($row = mysqli_fetch_assoc($resultado)) {
                ?>

                <tr class="contenidoTabla">
                    <td><?php echo $row['id_user']?></td>
                    <td><?php echo $row['user_name']?></td>
                    <td><?php echo $row['user_email']?></td>
                    <td>
                        <?php 
                        if($row['user_rol'] == 2){
                            echo 'Administrador';
                        }else{
                            echo 'Usuario';
                        }
                        ?>
                        </td>
                    <td><?php echo $row['user_date_created']?></td>
                    <td>
                        <button class="btn-Button btn-Eliminar">Eliminar</button>
                        <button class="btn-Button btn-Editar">Editar</button>
                    </td>
                </tr>

                <?php 
                    //liberando los datos
                    }
                    mysqli_free_result($resultado);
                ?>

            </table>
        
    </div>

</body>

</html>