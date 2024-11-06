<?php
// Configuración de la conexión a la base de datos
$host = 'localhost'; // Cambia esto si tu servidor MariaDB no está en localhost
$dbname = 'sics_5';
$username = 'root';
$password = '';

try {
    // Crear una instancia de la clase PDO
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    // En caso de error, mostrar un mensaje de error
    echo "Error de conexión: " . $e->getMessage();
}
?>