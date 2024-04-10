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
    <title>Panel Inicial</title>
    <link rel="stylesheet" href="../../../index.css">
    <link rel="stylesheet" href="../../styles/menu.css">
</head>

<body>

    <?php 
        include'../../components/menu-panel.php';
    ?>

    <div class="container-registros">
        <div class="fila">
            <div class="registros">
            <h2>Registros de <Strong>Usuarios</Strong> recientes ...</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="contenidoTabla">
                        <td>1</td>
                        <td>Victor</td>
                        <td>kreedlegend0@gmail.com</td>
                        <td>Admin</td>
                        <td>12-03-2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="registros">
            <h2>Registros de <Strong>Productos</Strong> recientes ...</h2>
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
                    </tr>
                </thead>
                <tbody>
                    <tr class="contenidoTabla">
                        <td>1</td>
                        <td>Cafe</td>
                        <td>Cafe con leche</td>
                        <td>20</td>
                        <td>20</td>
                        <td>Cafes</td>
                        <td>[IMG HERE]</td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div class="columna">
            <div class="container-usuario">
                <div class="usuario-img">
                        <svg 
                        data-testid="geist-icon" 
                        height="30" 
                        stroke-linejoin="round" 
                        viewBox="0 0 16 16" 
                        width="30" 
                        style="color: currentcolor;">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.75 0C5.95507 0 4.5 1.45507 4.5 3.25V3.75C4.5 5.54493 5.95507 7 7.75 7H8.25C10.0449 7 11.5 5.54493 11.5 3.75V3.25C11.5 1.45507 10.0449 0 8.25 0H7.75ZM6 3.25C6 2.2835 6.7835 1.5 7.75 1.5H8.25C9.2165 1.5 10 2.2835 10 3.25V3.75C10 4.7165 9.2165 5.5 8.25 5.5H7.75C6.7835 5.5 6 4.7165 6 3.75V3.25ZM2.5 14.5V13.1709C3.31958 11.5377 4.99308 10.5 6.82945 10.5H9.17055C11.0069 10.5 12.6804 11.5377 13.5 13.1709V14.5H2.5ZM6.82945 9C4.35483 9 2.10604 10.4388 1.06903 12.6857L1 12.8353V13V15.25V16H1.75H14.25H15V15.25V13V12.8353L14.931 12.6857C13.894 10.4388 11.6452 9 9.17055 9H6.82945Z" fill="currentColor">
                            </path>
                    </svg>
                </div>
                <div class="usuario-text">

                    <?php 
                        if(isset ($_SESSION['username'])) {
                            $username = $_SESSION['username'];
                            if($_SESSION['user_rol'] == 2 ){
                                $user_rol  = "Administrador";
                            }else{
                                $user_rol = "invitado";
                            }
                            $user_email = $_SESSION['user_email'];

                            echo '<h2><span style="font-weight: normal">Name:</span> ' . $username .'</h2>';
                            echo '<h3><span style="font-weight: normal">Rol:</span> ' . $user_rol .'</h3>';
                            echo '<h3><span style="font-weight: normal">Email:</span> ' . $user_email .'</h3>';
                        }else{
                            echo '<h2>Name User</h2>';
                            echo '<h3>Rol User</h3>';
                            echo '<h3>Email User</h3>';
                        }
                    ?>
                </div>
        </div>
        </div>
    </div>

    <div style="margin-top: 50px;" class="terminacion">
        <p style="align-items: center;">Esta página se hizo con fines practicos y de aprendizaje, por:  <strong>Victor Bernardo Chan Varguez ©</strong></p>
    </div>

</body>
</html>