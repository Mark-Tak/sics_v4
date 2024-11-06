<?php
session_start();

if (isset($_SERVER['HTTP_REFERER'])) {
    $_SESSION['previous_page'] = $_SERVER['HTTP_REFERER'];
}
// Incluye el archivo de conexión
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario
    $id_usuario = $_POST['idUsuario'];
    $nombre_usuario = $_POST['nomUsuario'];
    //$contra_usuario = $_POST['nomContra'];
    $contrahash_usuario = password_hash($_POST['nomContra'], PASSWORD_DEFAULT);
    $tipo_usuario = $_POST['nomTipo'];


    // Crea la consulta SQL para insertar los datos en la base de datos
    try {
        $sql = "INSERT INTO user(usuario, nombreusuario, contrasena, tipo) VALUES(:idusuario,:nomusuario,:contrasena,:tipo)";
        $stmt = $conexion->prepare($sql);

        // Vincula los parámetros
        $stmt->bindParam(':idusuario', $id_usuario);
        $stmt->bindParam(':nomusuario', $nombre_usuario);
        $stmt->bindParam(':contrasena', $contrahash_usuario);
        $stmt->bindParam(':tipo', $tipo_usuario);

        // Ejecuta la consulta
        $stmt->execute();

        echo "<script>
                    window.location.href = '" . $_SESSION['previous_page'] . "?estadoRegistro=100'; // Redirige al usuario
                  </script>";
    } catch (PDOException $e) {

        echo "<script>
                    window.location.href = '" . $_SESSION['previous_page'] . "?estadoRegistro=101'; // Redirige al usuario
                  </script>";
    }
}
?>