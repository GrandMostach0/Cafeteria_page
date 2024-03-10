<?php 
$servername = 'PlaceAndDelirios';
$username = 'admin';
$password = 'root';
$dbname = 'CafeteriaBD';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexion Fallida: " . $conn->connect_error);
}
?>