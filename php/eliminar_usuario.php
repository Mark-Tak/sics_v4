<?php

    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && isset($_GET['id'])){
        require('conexion.php');
        $id = $_GET['id'];

        try {
            $sql = 'DELETE FROM user WHERE usuario=:id';
            $stmt = $conexion -> prepare($sql);
            $stmt -> bindparam(':id', $id);
            $stmt -> execute();

            $response = array('success' => true);
            echo json_encode($response);
        } catch (\Throwable $th) {
            $response = array('success' => false, 'message' => 'Error al eliminar el registro: ' . $e->getMessage());
            echo json_encode($response);
        }    
    }

?>