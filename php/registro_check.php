<?php
session_start();

if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
}
// Incluye el archivo de conexión
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $nom_check = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $obs = $_POST['obs'];
    $limpieza = $_POST['limpieza'];


    // Crea la consulta SQL para insertar los datos en la base de datos
    try {
        //$sql = "INSERT INTO sala VALUES :perte_sala,:nom_sala,:artista_sala";
        $sql= "INSERT INTO checklist (nombre, fecha, observaciones, limpieza) VALUES (:nom_check,:fecha,:obs,:limpieza)";

        $stmt = $conexion->prepare($sql);

        // Vincula los parámetros
        $stmt->bindParam(':nom_check', $nom_check);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':obs', $obs);
        $stmt->bindParam(':limpieza', $limpieza);
        
        // Ejecuta la consulta
        $stmt->execute();

        echo "<script>
                    window.location.href = '" . $_SESSION['previous_page'] . "?estadoRegistro=100'; // Redirige al usuario
                  </script>";
    } catch (PDOException $e) {

        echo "<script>
                    window.location.href = '" . $_SESSION['previous_page'] . "?estadoRegistro=101'; // Redirige al usuario
                    console.log('error'".$e.");
                  </script>";
    }
}
?>