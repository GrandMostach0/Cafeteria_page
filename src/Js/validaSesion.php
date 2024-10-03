<?php
session_start();

if (isset($_SESSION['usuario'])){
    echo json_encode(['loggeIn' => true]);
}else{
    echo json_encode(['loggeIn' => false]);
}
?>