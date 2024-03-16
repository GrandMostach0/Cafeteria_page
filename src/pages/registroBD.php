<?php 
    require "../conexion.php";
    
    //obtenemos los datos del form por post
    $nombre = $_POST['name'];
    $apellido = $_POST['last_name'];
    $correo = $_POST['email'];
    $password = $_POST['password'];

    echo $nombre . "<br>";
    echo $apellido . "<br>";
    echo $correo . "<br>";
    echo $password . "<br>";

    $insertar = "INSERT INTO usuarios(user_name, user_last_name, user_email, user_password) VALUES ('$nombre', '$apellido', '$correo', '$password')";

    $query = mysqli_query($conectar, $insertar);

    if($query){
        echo "
        <script>
            alert('Si se ha GUARDADO LOS DATOS EN LA BASE DE DATOS');
            location.href = './LogIn.php';
        </script>";
    }else{
        echo "
        <script>
            alert('Ocurrio un ERROR DURANTE EL GUARDADO LOS DATOS EN LA BASE DE DATOS');
            location.href = './SingUp.php';
        </script>";
    }