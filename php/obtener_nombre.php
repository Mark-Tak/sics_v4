<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['user'])) {
    // Devolver el nombre del usuario en formato JSON
    echo json_encode(array('nombre' => $_SESSION['name']));
} else {
    // Si no hay sesión, devolver un error
    echo json_encode(array('error' => 'No se encontró el usuario.'));
}
?>