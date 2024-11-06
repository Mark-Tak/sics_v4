<?php

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id_check'])){
        require('conexion.php');
        $id = $_GET['id_check'];
        //$idcheck = ;

        try {
            $sql = 'DELETE FROM usuario_check WHERE check_user = :id ';
            $stmt = $conexion -> prepare($sql);
            $stmt -> bindparam(':id', $id);
            $stmt -> execute();

            $response = array('success' => true);
            echo json_encode($response);
        } catch (\Throwable $th) {
            $response = array('success' => false, 'message' => 'Error al quitar accesos: ' . $e->getMessage());
            echo json_encode($response);
        }    
    }

?>