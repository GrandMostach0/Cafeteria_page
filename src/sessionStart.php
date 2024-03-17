<?php
    require "conexion.php";

    session_start();

    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $consulta = "SELECT COUNT(*) AS contar, user_name FROM usuarios WHERE user_email = '$user_email' AND user_password = '$password'";

    $query = mysqli_query($conectar, $consulta);
    $array = mysqli_fetch_array($query);

    if ($array['contar'] > 0) {
        $_SESSION['$username'] = $array['user_name'];
        header("location: ../index.php");
    } else {
        header("location: ./pages/LogIn.php?login_success=false");
    }
?>

