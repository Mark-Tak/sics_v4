<?php

    if ($_SERVER['REQUEST_METHOD'] === 'UPDATE' && isset($_GET['id_check'])){
        require('conexion.php');
        $id = $_GET['id_check'];

        try {
            $sql='UPDATE checklist SET observaciones=0 WHERE id_check=:id';
            $stmt=$conexion -> prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();

            $response = array('success' => true);
            echo json_encode($response);
        } catch (\Throwable $th) {
            $response = array('success' => false, 'message' => 'Error al archivar el registro: ' . $e->getMessage());
            echo json_encode($response);
        }    
    }

?>