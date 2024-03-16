<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cafeteriaprueba';

$conectar = mysqli_connect($servername, $username, $password, $dbname);

if($conectar){
    echo 'Se conecto a la base de datos';
}else{
    echo 'No se pudo conectar a la base de datos';
}