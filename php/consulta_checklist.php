<?php
//Archivo para consultar las checklist no archivadas en la bd
require_once('conexion.php');

try {
    $stmt = $conexion->prepare('SELECT * FROM checklist WHERE archivado = 1');
    $stmt->execute();
    $checklist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($checklist);
} catch (PDOException $e) {
    echo "Error al recuperar los datos: " . $e->getMessage();
    die();
}

?>