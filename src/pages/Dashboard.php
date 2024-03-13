<?php

$nombre = $_POST['name'];
$apellido = $_POST['last_name'];
$correo = $_POST['email'];
$contrasenia = $_POST['password'];
$confcontrasenia = $_POST['confirmPassword'];

echo $nombre . "<br/>";
echo $apellido . "<br/>";
echo $correo . "<br/>";
echo $contrasenia . "<br/>";
echo $confcontrasenia . "<br/>";

header("Location: menu/panel_menu.php");