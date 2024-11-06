<?php
session_start();

// Incluir el archivo de conexión
require_once('conexion.php');

// Destruir todas las sesiones
session_destroy();

// Devolver una respuesta indicando que la sesión se ha cerrado
echo json_encode(array('mensaje' => 1));
?>