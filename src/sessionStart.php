<?php 
    require "conexion.php";

    session_start();

    $user_email = $_POST['user_email'];
    $password = $_POST['password'];

    $consulta = "SELECT COUNT(*) AS contar FROM usuarios WHERE user_email = '$user_email' AND user_password = '$password'";

    $consulta = mysqli_query($conectar, $consulta);
    $array = mysqli_fetch_array($consulta);

    if($array['contar'] > 0){
        $_SESSION['$username'] = $user_email;
        header("location: ../index.php");
    }else{
        header("location: ./pages/LogIn.php");
    }