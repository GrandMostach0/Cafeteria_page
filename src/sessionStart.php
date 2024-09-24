<?php
    require "conexion.php";

    session_start();

    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $consulta = "SELECT COUNT(*) AS contar, id_user, user_name, user_rol, user_email FROM usuarios WHERE user_email = '$user_email' AND user_password = '$password'";

    $query = mysqli_query($conectar, $consulta);
    $array = mysqli_fetch_array($query);

    if ($array['contar'] > 0) {
        $_SESSION['username'] = $array['user_name'];
        $_SESSION['user_rol'] = $array['user_rol'];
        $_SESSION['user_email'] = $array['user_email'];
        $_SESSION['id_user'] = $array['id_user'];

        //redireccion segun el rol
        if ($array['user_rol'] == 1) {
            header("location: ../index.php");
        } elseif ($array['user_rol'] == 2 || $array['user_rol'] == 3) {
            header("location: ./pages/MenuPagesAdmin.php");
        }
    } else {
        header("location: ./pages/LogIn.php?login_success=false");
    }
