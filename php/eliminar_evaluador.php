<?php

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    require('conexion.php');
    $id = $_GET['id'];
    $idcheck = $_GET['idck'];
    $turno = $_GET['tu'];

    try {
        $sql = 'DELETE FROM usuario_check WHERE user_check = :id AND check_user = :idck AND turno = :tu';
        $stmt = $conexion->prepare($sql);
        $stmt->bindparam(':id', $id);
        $stmt->bindparam(':idck', $idcheck);
        $stmt -> bindparam(':tu', $turno);
        $stmt->execute();

        $response = array('success' => true);
        echo json_encode($response);
    } catch (\Throwable $th) {
        $response = array('success' => false, 'message' => 'Error al eliminar el evaluador: ' . $e->getMessage());
        echo json_encode($response);
    }
}
