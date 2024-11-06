<?php
require_once('conexion.php');

try {
    $stmt = $conexion->prepare('SELECT * FROM user');
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error al consultar la base de datos: " . $e->getMessage();
    die();
}

header('Content-Type: application/json');
echo json_encode($data);
?>