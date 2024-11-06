<?php
//Archivo para consultar las checklist no archivadas en la bd
require_once('conexion.php');

$id = $_GET['id_check'];


try {
    $stmt = $conexion->prepare('SELECT user_check,turno FROM usuario_check WHERE check_user = :id');
    $stmt -> bindparam(':id', $id);
    $stmt->execute();
    $checklist = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($checklist);
} catch (PDOException $e) {
    echo "Error al recuperar los datos: " . $e->getMessage();
    die();
}

?>