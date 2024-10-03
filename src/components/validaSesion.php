<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

header('Content-Type: application/json'); // Asegúrate de que el contenido es JSON

// Validar si existe la sesión 'username'
if (isset($_SESSION['username'])) {
    echo json_encode(['loggedIn' => true]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>