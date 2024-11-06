<?php
session_start();

require_once "conexion.php"; // Archivo de conexion a la BD

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user'];
    $password = trim($_POST['pass']);
    

    

    // Consultar la base de datos para obtener los datos del usuario
    $stmt = $conexion->prepare('SELECT usuario, nombreusuario, contrasena, tipo FROM user WHERE usuario = :us');
    $stmt->bindparam(':us', $user_id);
    $stmt->execute();

    //Se almacena los resultados de la consulta en una variable
    $numeroRegistro = $stmt->rowCount();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Verificar si encontro un registro
    if ($numeroRegistro === 1) {
        $user = $result;

        // Verificar la contraseña
        if (password_verify($password, $user['contrasena'])) {
            $_SESSION['user'] = $user['usuario'];
            $_SESSION['name'] = $user['nombreusuario'];
            

            // Redirigir según el rol del usuario. 1=Administrador, 2=Encargado y 3=Auxiliar
            if ($user['tipo'] == '1') {
                $_SESSION['tipo'] = '1';
                header('Location: ../menu_admin.php');
            } elseif ($user['tipo'] == '2') {
                $_SESSION['tipo'] = '2';
                header('Location: ../menu_encargado.php');
            } elseif ($user['tipo'] == '3') {
                $_SESSION['tipo'] = '3';
                header('Location: ../menu_auxiliar.php');
            }
            exit();
        } else {
            echo 'Contraseña incorrecta.';
        }
    } else {
        echo 'Usuario no encontrado.';
    }
}
?>